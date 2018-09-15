@extends('backend.layout.index')
@section('style')
    <style>
        .styleleft {
            padding-left: 30px;
        }
        .styleright{
            padding-right: 30px;
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
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($courseCategory) ? url('admin/course-category/' . $courseCategory->id) : url('admin/course-category') }}">
                                @if(isset($courseCategory))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 styleright">
                                        <div class="form-group">
                                            <label class="control-label required">Tên danh mục</label>
                                            <input type="text" name="name" class="form-control" value="{{ $courseCategory->name or old('name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">URL thân thiện</label>
                                            <input type="text" name="alias" id="alias" class="form-control" value="{{ $courseCategory->alias or old('alias') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 styleleft">
                                        <div class="form-group">
                                            <label class="control-label">Danh mục cha</label>
                                            <select name="parent_id" class="form-control select2" data-placeholder="Danh mục cấp cao nhất">
                                                <option></option>
                                                {!! $categories !!}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Hiển thị ở trang chủ</label>
                                            <select class="form-control" name="status" data-placeholder="Chọn trạng thái hiển thị">
                                                @if(old('status') == '1' || old('status') == '0')
                                                    <option value="1" {{ old('status') == '1' ? 'selected' : ''}}>Có</option>
                                                    <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>Không</option>
                                                @else
                                                    <option value="1" {{ isset($courseCategory) && $courseCategory->status == 1 ? 'selected' : '' }}>Có</option>
                                                    <option value="0" {{ isset($courseCategory) && $courseCategory->status == 0 ? 'selected' : '' }}>Không</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">Mô tả</label>
                                    <textarea class="form-control" name="description" rows="5">{{ $courseCategory->description or old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thẻ tiêu đề</label>
                                    <div class="">
                                        <textarea class="form-control" name="meta_title" rows="5">{{ $courseCategory->meta_title or old('meta_title') }}</textarea>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label">Thẻ mô tả</label>
                                    <textarea class="form-control" name="meta_description" rows="5">{{ $courseCategory->meta_description or old('meta_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                    <a href="{{ url('admin/course-category') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
                            table: 'course',
                            id: {{ isset($courseCategory) ? $courseCategory->id : 0 }},
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