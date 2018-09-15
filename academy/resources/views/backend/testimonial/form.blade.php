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
                  <form class="form-horizontal" role="form" method="post" action="{{ isset($testimonial) ? url('admin/testimonial/'. $testimonial->id) : url('admin/testimonial') }}" id="form">
                     @if(isset($testimonial))
                     {{ method_field('put') }}
                     @endif
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label required">Tên</label>
                              <input type="text" name="name" class="form-control" value="{{ $testimonial->name or '' }}"">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="control-label">Thông Tin</label>
                              <input type="text" name="info" class="form-control" value="{{ $testimonial->info or ''}}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label required">Nội Dung</label>
                              <input type="text" name="content" id="content" class="form-control" value="{{ $testimonial->content or '' }}">
                           </div>
                        </div>

                        <div class="form-group text-right m-b-0">
                           <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                           <a href="{{ url('admin/testimonial') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
            content: {
               required: true,
               normalizer: function(value) {
                  return $.trim(value);
               },
               info: true,
            }
         },
            messages: {
               name: "Chưa nhập tên",
               info:{
                  required: "Chưa nhập thông tin",
               },
                content: {
                    required: "Chưa nhập nội dung",
                }
            }
      });
   </script>
@endsection