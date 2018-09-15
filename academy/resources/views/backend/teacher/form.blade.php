@extends('backend.layout.index')

@section('style')
    <!-- Bootstrap fileupload css -->
    <link href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
    <style>
        .form-group {
            padding: 0 20px !important;
        }
    </style>
@endsection

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                {{-- <h4 class="m-t-0 header-title"><b>{{ $title }}</b></h4> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($teacher) ? url('admin/teacher/' . $teacher->id) : url('admin/teacher') }}" enctype='multipart/form-data'>
                                @if(isset($teacher))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Tên giảng viên</label>
                                        <input type="text" name="name" class="form-control" value="{{ $teacher->name or old('name') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Giới tính</label>
                                        <select class="form-control" name="gender">
                                            <option value="1" {{ isset($teacher) && $teacher->gender == 1 ? 'selected' : '' }}>Nam</option>
                                            <option value="0" {{ isset($teacher) && $teacher->gender == 0 ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                </div>    
                                
                                <div class="row">  
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Ngày sinh</label>
                                        <div class="input-group">
                                            <input type="text" name="birthday" class="form-control datepicker-autoclose" value="{{ $teacher->birthday or old('birthday') }}" >
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Chức vụ</label>

                                        <input type="text" name="position" class="form-control" value="{{ $teacher->position or '' }}">
                                        {{--<select name="position" id="" class="form-control select2" data-placeholder="Chọn chức vụ">--}}
                                            {{--<option value=""></option>--}}
                                            {{--@foreach($position as $p)--}}
                                                {{--<option value="{{ $p }}" {{ isset($teacher) && $teacher->position == $p ? 'selected' : '' }}>Giảng viên {{ $p }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $teacher->phone or old('phone') }}">
                                    </div>

                                    <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label class="control-label required">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $teacher->email or old('email') }}">
                                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Địa chỉ</label>
                                        <textarea name="address" cols="30" rows="5" class="form-control">{{ $teacher->address or old('address') }}</textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Mô tả</label>
                                        <textarea class="form-control" name="information" rows="5">{{ $teacher->information or old('infomation') }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Ảnh đại diện</label>
                                        <div class="fileupload fileupload-{{isset($teacher) ? 'exists' : 'new' }}" data-provides="fileupload">
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
                                                @if (isset($teacher))
                                                <img src="{{ $teacher->getImage() }}" alt="image" />
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
                                        <label class="control-label">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" value="{{ $teacher->linkedin or old('linkedin') }}">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ $teacher->facebook or old('facebook') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Skype</label>
                                        <input type="text" name="skype" class="form-control" value="{{ $teacher->skype or old('skype') }}">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ $teacher->twitter or old('twitter') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Youtube</label>
                                        <input type="text" name="youtube" class="form-control" value="{{ $teacher->youtube or old('youtube') }}">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label"></label>
                                        <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                        <a href="{{ url('admin/teacher') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
    <!-- Bootstrap fileupload js -->
    <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script>
        $('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
        });

        jQuery.extend(jQuery.validator.messages, {
            accept: "Chỉ chấp nhận file ảnh",
        });

        // validate phone
        jQuery.validator.addMethod("phone_number", function(phone_number, element) {
	        phone_number = phone_number.replace(/\s+/g, "");
	        return this.optional(element) || phone_number.length > 9 && 
	        phone_number.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
	    }, "Số điện thoại không hợp lệ");

        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                position: "required",
                phone: {
                	required: true,
		          	phone_number: true,
		        },
                email: {
					required: true,
					email: true,
					remote: {
				        url: "{{ url('admin/ajax/check-mail') }}",
				        type: "post",
				        data: {
				          	email: function() {
					            return $( "#email" ).val();
					        },
				          	table: 'teacher',
				          	id: {{ isset($teacher) ? $teacher->id : 0 }},
				        },
				    }
				},
                image_file: {
                    @if (!isset($teacher))
                    required: true,
                    @endif
                    accept: "image/*"
                },
                birthday: "required",
                address: "required",
                linkedin: {
                    url: true,
                },
                facebook: {
                    url: true,
                },
                skype: {
                    url: true,
                },
                twitter: {
                    url: true,
                },
                youtube: {
                    url: true,
                },
            },
            messages: {
                name: "Chưa nhập tên",
                position: "Chưa chọn chức vụ",
                phone: {
                	required: "Chưa nhập số điện thoại",
                },
           		email: {
					required: "Chưa nhập Email",
					email: "Email không đúng định dạng",
					remote: "Email đã tồn tại trong hệ thống",
				},
                image_file: {
                    required: "Chưa chọn ảnh",
                },
                birthday: "Chưa nhập ngày sinh",
                address: "Chưa nhập địa chỉ",
                linkedin: {
                    url: "Url không hợp lệ!",
                },
                facebook: {
                    url: "Url không hợp lệ!",
                },
                skype: {
                    url: "Url không hợp lệ!",
                },
                twitter: {
                    url: "Url không hợp lệ!",
                },
                youtube: {
                    url: "Url không hợp lệ!",
                },
            },
        });
    </script>
@endsection