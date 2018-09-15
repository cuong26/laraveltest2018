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
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($courseComment) ? url('admin/course-comment/' . $courseComment->id) : url('admin/course-comment') }}" enctype='multipart/form-data'>
                                @if(isset($courseComment))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 styleright">
                                        <div class="form-group">
                                            <label class="control-label required">Tên</label>
                                            <div class="">
                                                <input type="text" name="name" class="form-control" value="{{ $courseComment->name or '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <div class="">
                                                <input type="email" class="form-control" name="email" value="{{ $courseComment->email or '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Khóa học</label>
                                            <div class="">
                                                <input type="text" name="course_id" class="form-control" value="{{ $courseComment->course_id or '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 styleleft">
                                        <div class="form-group">
                                            <label class="control-label">Học viên</label>
                                            <div class="">
                                                <input type="text" name="student_id" class="form-control" value="{{ $courseComment->student_id or '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Comment cha</label>
                                            <div class="">
                                                <input type="text" name="parent_id" class="form-control" value="{{ $courseComment->parent_id or '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Trạng thái</label>
                                            <div class="">
                                                <select class="form-control select2" name="status">
                                                    <option value="1" {{ isset($courseComment)  && $courseComment->status == 1 ? 'selected' : ''}}>Đã kiển duyệt</option>
                                                    <option value="0" {{ isset($courseComment)  && $courseComment->status == 0 ? 'selected' : ''}}>Chưa kiểm duyệt</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label required">Nội dung</label>
                                            <div class="">
                                                <textarea class="form-control" name="content" rows="5">{{ $courseComment->content or '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                        <a href="{{ url('admin/course-comment') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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