@extends('backend.layout.index')
@section('style')
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
                  <form class="form-horizontal" role="form" method="post" action="{{ isset($contact) ? url('admin/contact/'. $contact->id) : url('admin/contact') }}" id="form">
                     @if(isset($contact))
                     {{ method_field('put') }}
                     @endif
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label required">Tên liên hệ</label>
                              <input type="text" name="name" class="form-control" value="{{ $contact->name or old('name') }}">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="control-label">Tiêu đề</label>
                              <input type="text" name="subject" class="form-control" value="{{ $contact->subject or old('subject')}}">
                              <span class="help-block">{{ $errors->first('subject', ':message') }}</span>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label required">Email</label>
                              <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email or old('email') }}">
                              <span class="help-block" style="color:red;">{{ $errors->first('email', ':message') }}</span>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <label class="control-label">Message</label>
                              <textarea id="ckeditor" class="form-control" name="message">{{ $contact->message or old('message') }}</textarea>
                           </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                           <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                           <a href="{{ url('admin/contact') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
   <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
   <script>
      CKEDITOR.replace( 'ckeditor');
      $("#form").validate({
         rules: {
            name: {
               required: true,
               normalizer: function(value) {
                  return $.trim(value);
               }
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
                     table: "contacts",
                     id: "{{ isset($contact) ? $contact->id : 0 }}"
                  }
               }
            }
         },
            messages: {
               name: "Chưa nhập tên",
               email:{
                  required: "Chưa nhập email",
                  email: "Chưa đúng định dạng email",
                  remote: "Email đã tồn tại trong hệ thống"
               }
            }
      });
   </script>
@endsection