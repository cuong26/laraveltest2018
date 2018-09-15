@extends('backend.layout.index')

@section('style')
    <style>
        .form-group label {
            text-align: left !important;
        }
    </style>
@endsection

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($news_category) ? url('admin/news-category/' . $news_category->id) : url('admin/news-category') }}">
                                @if(isset($news_category))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-2 control-label required">Tên danh mục</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control" value="{{ $news_category->name or '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">Danh mục cha</label>
                                	<div class="col-md-10">
                                		<select name="parent_id" class="form-control select2" data-placeholder="Danh mục cấp cao nhất">
	                                        <option></option>
                                            {!! $categories !!}
                                    	</select>
                                	</div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">URL thân thiện</label>
                                    <div class="col-md-10">
                                        <input type="text" name="alias" id="alias" class="form-control" value="{{ $news_category->alias or '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Mô tả</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="description" rows="5">{{ $news_category->description or '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">Hiển thị ở trang chủ</label>
                                	<div class="col-md-10">
                                		<select class="form-control" name="status" data-placeholder="Chọn trạng thái hiển thị">
                                            <option value="1" {{ isset($news_category) && $news_category->status == 1 ? 'selected' : '' }}>Có</option>
                                            <option value="0" {{ isset($news_category) && $news_category->status == 0 ? 'selected' : '' }}>Không</option>
                                    	</select>
                                	</div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Thẻ tiêu đề</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="meta_title" rows="5">{{ $news_category->meta_title or '' }}</textarea>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-2 control-label">Thẻ mô tả</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="meta_description" rows="5">{{ $news_category->meta_description or '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                        <a href="{{ url('admin/news-category') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
@endsection
@section('script')
    <script>
        jQuery.validator.addMethod("friendly_url", function(friendly_url, element) {
            return this.optional(element) || friendly_url.match(/^[A-z0-9.-]+$/);
        }, "Chỉ chấp nhận chữ, số và ký tự -");

        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                alias: {
                    remote: {
                        url: "{{ url('admin/ajax/check-alias') }}",
                        type: "post",
                        data: {
                            alias: function() {
                                return $( "#alias" ).val();
                            },
                            table: 'news_category',
                            id: {{ isset($news_category) ? $news_category->id : 0 }},
                        },
                    },
                    friendly_url: true,
                }
            },
            messages: {
                name: "Chưa nhập tên",
                alias: {
                    remote: "URL đã tồn tại",
                },
            },
        });
    </script>
@endsection