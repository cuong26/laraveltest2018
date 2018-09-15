@extends('backend.layout.index')

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>{{ $title }}</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($news_comment) ? url('admin/news-comment/' . $news_comment->id) : url('admin/news-comment') }}" enctype='multipart/form-data'>
                                @if(isset($news_comment))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-2 control-label required">Tên</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control" value="{{ $news_comment->name or '' }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">Email</label>
                                	<div class="col-md-10">
                                		<input type="email" class="form-control" name="email" value="{{ $news_comment->email or '' }}">
                                	</div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">News_id</label>
                                	<div class="col-md-10">
										<input type="text" class="form-control" name="news_id" value="">
                                	</div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">Student_id</label>
                                	<div class="col-md-10">
                                		<input type="text" class="form-control" name="student_id" value="{{ $news_comment->email or '' }}">
                                	</div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">Parent_id</label>
                                	<div class="col-md-10">
                                		<input type="text" class="form-control" name="parent_id" value="{{ $news_comment->email or '' }}">
                                	</div>
                                </div>

                                <div class="form-group">
                                	<label class="col-md-2 control-label">Trạng thái</label>
                                	<div class="col-md-10">
                                		<select name="status" id="">
                                			<option value="0">0</option>
                                			<option value="1">1</option>
                                		</select>
                                	</div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label required">Nội dung</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="content" rows="5">{{ $news_comment->content or '' }}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label class="control-label col-md-2">Link</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="link" name="url" value="{{ $news_comment->link or '' }}">
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label class="control-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                        <a href="{{ url('admin/news-comment') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
		$("#form").validate({
			rules: {
				name: "required",
				content: "required",
			},
			messages: {
				name: "Chưa nhập tên",
				content: "Chưa nhập nội dung",
			},
		});
	</script>
@endsection