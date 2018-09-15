@extends('backend.layout.index')
@section('style')
   <!-- Bootstrap fileupload css -->
   <link href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
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
                  <form class="form-horizontal" role="form" method="post" action="{{ isset($user) ? url('admin/user/'. $user->id) : url('admin/user') }}" id="form" enctype='multipart/form-data'>
                     @if(isset($user))
                     {{ method_field('put') }}
                     @endif

                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                           <div class="col-md-6 styleright">
                              <div class="form-group">
                                 <label class="control-label required">Tên người dùng</label>
                                 <input type="text" name="name" class="form-control" value="{{ $user->name or old('name') }}">
                              </div>
                              <div class="form-group">
                                 <label class="control-label required">Mật khẩu</label>
                                 <input type="password" id="password" name="password" class="form-control">
                              </div>
                              <div class="form-group">
                                 <label class="control-label required">Nhập lại mật khẩu</label>
                                 <input type="password" name="password_confirm" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-6 styleleft">
                              <div class="form-group">
                                 <label class="control-label required">Quyền</label>
                                 <select name="role" class="form-control">
                                 @foreach($role as $k => $r)
                                    <option value="{{ $k }}" {{ isset($user) && $user->role == $k ? 'selected' : '' }}>{{ $r }}</option>
                                 @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label class="control-label required">Email</label>
                                 <input type="email" id="email" name="email" class="form-control" value="{{ $user->email or old('email') }}">
                                 <span class="help-block" style="color:red;">{{ $errors->first('email', ':message') }}</span>
                              </div>

                              <div class="form-group">
                                 <label class="control-label">Ảnh</label>
                                 <div class="">
                                    <div class="fileupload fileupload-{{isset($user) ? 'exists' : 'new' }}" data-provides="fileupload">
                                       <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
                                          @if (isset($user))
                                             <img src="{{ $user->getImage() }}" alt="image" />
                                          @endif
                                       </div>
                                       <div>
                                          <button type="button" class="btn btn-default btn-file">
                                             <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
                                             <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                             <input type="file" name="avartar" class="btn-default upload" accept="image/*"/>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label"></label>
                           <div class="">
                              <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                              <a href="{{ url('admin/user') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
                           </div>
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
   <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
   <script>
      $("#form").validate({
         rules: {
            name: {
               required: true,
               normalizer: function(value) {
                  return $.trim(value);
               }
            },
            role:{
               required: true,
               min: 0
            },
            password: {
               required: true,
               minlength: 6
            },
            password_confirm: {
               required:true,
               equalTo: "#password"
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
                     table: "users",
                     id: "{{ isset($user) ? $user->id : 0 }}"
                  }
               }
            }
         },
            messages: {
               name: "Chưa nhập tên",
               role: {
                  required: "Chưa nhập quyền",
                  min: "Số nhập không được nhỏ hơn 0"
               },
               password: {
                  required: "Vui lòng nhập mật khẩu",
                  minlength: "Mật khẩu không được nhỏ hơn 6 ký tự"
               },
               password_confirm: {
                  required: "Vui lòng nhập lại mật khẩu",
                  equalTo: "Mật khẩu nhập lại không đúng"
               },
               email:{
                  required: "Chưa nhập email",
                  email: "Chưa đúng định dạng email",
                  remote: "Email đã tồn tại trong hệ thống"
               }
            }
      });
   </script>
@endsection