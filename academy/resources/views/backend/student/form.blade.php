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
         <div class="row">
            <div class="col-md-12">
               <div class="p-20">
                  <form class="form-horizontal" role="form" method="post" action="{{ isset($student) ? url('admin/student/'. $student->id) : url('admin/student') }}" id="form" enctype='multipart/form-data'>
                     @if(isset($student))
                     {{ method_field('put') }}
                     @endif
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label required">Họ tên</label>
                                 <input type="text" name="name" class="form-control" value="{{ $student->name or '' }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label required">Ngày sinh</label>
                                 <div class="input-group">
                                    <input type="text" name="birthday" class="form-control datepicker-autoclose" value="{{ $student->birthday or old('birthday')}}" >
                                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">Giới tính</label>
                                 <select class="form-control select2" name="gender">
                                    @if(old('gender') == '1' || old('gender') == '0')
                                       <option value="1" {{ old('gender') == '1' ? 'selected' : ''}}>Nam</option>
                                       <option value="0" {{ old('gender') == '0' ? 'selected' : ''}}>Nữ</option>
                                    @else
                                       <option value="1" {{ isset($student)  && $student->gender == 1 ? 'selected' : ''}}>Nam</option>
                                       <option value="0" {{ isset($student)  && $student->gender == 0 ? 'selected' : ''}}>Nữ</option>
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label required">Email</label>
                                 <input type="email" name="email" id="email" class="form-control" value="{{ $student->email or old('email') }}">
                                 <span class="help-block" style="color:red;">{{ $errors->first('email', ':message') }}</span>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label required">Số điện thoại</label>
                                 <input type="text" name="phone" class="form-control" value="{{ $student->phone or old('phone')}}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label required">Địa chỉ</label>
                                 <input type="text" name="address" class="form-control" value="{{ $student->address or old('address')}}">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">Facebook</label>
                                 <input type="text" name="facebook" class="form-control" value="{{ $student->facebook or old('facebook')}}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">Chức Vụ</label>
                                 <input type="text" name="position" class="form-control" value="{{ $student->position or old('position')}}">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">Công ty/ Tổ Chức</label>
                                 <input type="text" name="company" class="form-control" value="{{ $student->company or ''}}">
                              </div>
                           </div>
                           <div class="col-md-6">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="control-label required">Ghi Chú</label>
                                 <textarea name="note" class="form-control" id="footer_content" cols="30" rows="5" value="{{ $student['note'] or '' }}">{{ $student['note'] or '' }}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group text-right">
                              <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                              <a href="{{ url('admin/student') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
                           </div>
                        </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- end row -->
      </div>
      <!-- end card-box -->
   </div>
   <!-- end col -->
</div>
<!-- end row -->
@endsection
@section('script')
   <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
   <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
   <script>
      $('.datepicker-autoclose').datepicker({
         autoclose: true,
         todayHighlight: true,
         format: 'dd/mm/yyyy',
      });
      jQuery.extend(jQuery.validator.messages, {
         accept: "Chỉ chấp nhận file ảnh"
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
            birthday: "required",
            address: {
               required: true,
               normalizer: function(value) {
                  return $.trim(value);
               }
            },
             gender: "required",
             note:"required",
             phone:{
                 required: true,
                 phone_number: true,
             },
            email: {
               required: true,
               normalizer: function(value) {
                  return $.trim(value);
               },
               email: true,
               remote: {
                  url: "{{ 'admin/ajax/check-mail' }}",
                  type:"post",
                  data: {
                     email: function(){
                        return $("#email").val();
                     },
                     table: "students",
                     id: "{{ isset($student) ? $student->id : 0 }}"
                  }
               }
            }
         },
         messages: {
            name: "Chưa nhập tên",
            birthday: "Chưa nhập ngày sinh",
            address: "Chưa nhập địa chỉ",
            gender: "Vui lòng chọn giới tính",
            password: {
               required: "Chưa nhập mật khẩu",
               minlength: "Mật khẩu không được nhỏ hơn 6 ký tự"
            },
            phone: {
               required: "Chưa nhập số điện thoại"
            },
            email: {
                required: "Chưa nhập email",
                email: "Chưa đúng định dạng email",
                remote: "Email đã tồn tại trong hệ thống"
            },
             note:{
                 required:"Chưa nhập Ghi Chú",
             },
         }
      });
   </script>
@endsection