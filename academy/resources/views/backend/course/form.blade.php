@extends('backend.layout.index')

@section('style')
    <!-- Bootstrap fileupload css -->
    <link href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <style>
        #cke_1_contents {
            height: 400px !important;
        }
        .form-group {
            padding: 0 20px !important;
        }
        .section {
            padding: 10px;
        }
        .section .panel-title .pull-right {
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#main" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Thông tin</span>
                        </a>
                    </li>
                    <li>
                        <a href="#lesson" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Nội dung</span>
                        </a>
                    </li>
                    <li>
                        <a href="#comment" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Bình luận</span>
                        </a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($course) ? url('admin/course/'.$course->id) : url('admin/course') }}" enctype='multipart/form-data'>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="main">
                                        @if(isset($course))
                                            {{ method_field('put') }}
                                        @endif
                                            {{ csrf_field() }}

                                        <div class="row">
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Tên khóa học</label>
                                                <input type="text" name="name" class="form-control" value="{{ $course->name or '' }}">
                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label">URL thân thiện</label>
                                                <input type="text" name="alias" id="alias" class="form-control" value="{{ $course->alias or '' }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Danh mục khóa học</label>
                                                <select name="category_id" class="form-control select2" data-placeholder="Chọn danh mục">
                                                    <option></option>
                                                    {!! $categories !!}
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Giảng viên</label>
                                                <select name="teacher_id" class="form-control select2" data-placeholder="Chọn giảng viên">
                                                    <option></option>
                                                    @if(count($teacher))
                                                    @foreach($teacher as $k => $v)
                                                        <option value="{{ $k }}" {{ isset($course) && $course->teacher_id == $k ? 'selected' : '' }}>{{ $v }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Ngày bắt đầu</label>
                                                <div class="input-group">
                                                    <input type="text" id="course_start" name="course_start" class="form-control datepicker-autoclose" value="{{ $course->course_start or '' }}" >
                                                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Ngày kết thúc</label>
                                                <div class="input-group">
                                                    <input type="text" id="course_end" name="course_end" class="form-control datepicker-autoclose" value="{{ $course->course_end or '' }}" >
                                                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Giờ bắt đầu</label>
                                                <div class="input-group">
                                                    <input type="text" id="class_start" name="class_start" value="{{ $course->class_start or '' }}" class="form-control timepicker">
                                                    <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                                                </div>
                                            </div>  

                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Giờ kết thúc</label>
                                                <div class="input-group">
                                                    <input type="text" id="class_end" name="class_end" value="{{ $course->class_end or '' }}" class="form-control timepicker">
                                                    <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Lịch học</label>
                                                <select name="school_day[]" class="form-control select2_clear" data-placeholder="Chọn danh mục" multiple>
                                                    <option></option>
                                                    <option value="1" {{ isset($course) && in_array(1, $course->school_day) ? 'selected' : '' }}>Chủ nhật</option> 
                                                    <option value="2" {{ isset($course) && in_array(2, $course->school_day) ? 'selected' : '' }}>Thứ hai</option> 
                                                    <option value="3" {{ isset($course) && in_array(3, $course->school_day) ? 'selected' : '' }}>Thứ ba</option> 
                                                    <option value="4" {{ isset($course) && in_array(4, $course->school_day) ? 'selected' : '' }}>Thứ tư</option> 
                                                    <option value="5" {{ isset($course) && in_array(5, $course->school_day) ? 'selected' : '' }}>Thứ năm</option> 
                                                    <option value="6" {{ isset($course) && in_array(6, $course->school_day) ? 'selected' : '' }}>Thứ sáu</option> 
                                                    <option value="7" {{ isset($course) && in_array(7, $course->school_day) ? 'selected' : '' }}>Thứ bảy</option> 
                                                </select>
                                            </div>  

                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Giá</label>
                                                <input type="text" class="form-control autonumber" name="price" value="{{ $course->price or '' }}" data-v-max="99999999999" data-v-min="0"> 
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Số học viên</label>
                                                <input type="text" class="form-control" name="size" value="{{ $course->size or '' }}"> 
                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                <label class="control-label required">Cấp học</label>
                                                <select name="level" class="form-control select2" data-placeholder="Chọn cấp học">
                                                    <option value=""></option>
                                                    @foreach($level as $l)
                                                    <option value="{{ $l }}" {{ isset($course) && $course->level == $l ? 'selected' : '' }}>{{ $l }}</option>   
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label required">Ảnh đại diện</label>
                                                <div class="fileupload fileupload-{{isset($course) ? 'exists' : 'new' }}" data-provides="fileupload">
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
                                                        @if (isset($course))
                                                        <img src="{{ $course->getImage() }}" alt="image" />
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-default btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                                            <input type="file" name="image_file" class="btn-default upload" />
                                                        </button>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Khóa học nổi bật</label>
                                                <select class="form-control" name="feature" >
                                                    <option value="1" {{ isset($course) && $course->feature == 1 ? 'selected' : '' }}>Có</option>
                                                    <option value="0" {{ isset($course) && $course->feature == 0 ? 'selected' : '' }}>Không</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label class="control-label required">Mô tả ngắn</label>
                                                    <textarea name="description" cols="30" rows="5" class="form-control">{{ $course->description or '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label class="control-label">Thông tin chi tiết</label>
                                                <textarea id="ckeditor" name="information" cols="30" rows="5" class="form-control">{{ $course->information or '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label class="control-label required">Địa điểm</label>
                                                <textarea name="address" cols="30" rows="2" class="form-control">{{ $course->address or '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label class="control-label">Thẻ tiêu đề</label>
                                                <textarea class="form-control" name="meta_title" rows="2">{{ $course->meta_title or '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label class="control-label">Thẻ mô tả</label>
                                                    <textarea class="form-control" name="meta_description" rows="2">{{ $course->meta_description or '' }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="lesson">
                                        <div id="section">{!! $html or '' !!}</div>
                                        <a href="javascript:void(0)" id="add" class="btn btn-success waves-effect w-md waves-light pull-right">Thêm mới học phần</a>
                                    </div>
                                    <div class="tab-pane" id="comment">
                                        @if(isset($course) && count($course->comment))
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-bordered-custom m-b-20">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Tên người bình luận</th>
                                                    <th class="text-center">Trạng thái</th>
                                                    <th class="text-center">Nội Dung</th>
                                                    <th class="text-center">Hành động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($course->comment as $c)
                                                <tr>
                                                    <td>{{ $c->name }}</td>
                                                    <td class="text-center label-status">
                                                        @if($c->status)
                                                            <label class="label label-success">Đã kiểm duyệt</label>
                                                        @else
                                                            <label class="label label-warning">Chưa kiếm duyệt</label>
                                                        @endif
                                                    </td>
                                                    <td>{{ $c->content }}</td>
                                                    <td class="text-center">
                                                        <div class="hidden">{!! $c->content !!}</div>
                                                        @if($c->status)
                                                            <a href="javascript:void(0)" class="btn btn-warning check" title="Bỏ kiểm duyệt" data-id="{{ $c->id }}" data-status="{{ $c->status }}">
                                                                <i class="fa fa-thumbs-o-down"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)" class="btn btn-success check" title="Kiểm duyệt" data-id="{{ $c->id }}" data-status="{{ $c->status }}">
                                                                <i class="fa fa-thumbs-o-up"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" class="btn btn-danger detach" title="{{ __('table.delete') }}" data-url="{{ url('admin/course-comment/' . $c->id) }}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label class="control-label"></label>
                                            <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                            <a href="{{ url('admin/course') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="edit-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Chỉnh sửa học phần</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-xs-2">Tên học phần</label>
                                <div class="col-xs-10">
                                    <input type="text" class="form-control" id="section-name">
                                    <input type="hidden" id="section-count">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-default waves-effect" data-dismiss="modal">Hủy</a>
                    <a href="javascript:void(0)" class="btn btn-info waves-effect waves-light" data-dismiss="modal" id="edit">OK</a>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
    <input type="hidden" id="count" value="{{ isset($course) ? $course->section->count() : 0 }}">
@endsection

@section('script')
    <!-- Bootstrap fileupload js -->
    <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
    <script src="plugins/timepicker/bootstrap-timepicker.js"></script>
    <script src="plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
    <script src="plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
    @include('backend.course.script')
@endsection
