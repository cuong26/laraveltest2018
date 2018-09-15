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
                  <form class="form-horizontal" role="form" method="post" action="{{ isset($menu) ? url('admin/menu/'. $menu->id) : url('admin/menu') }}" id="form">
                     @if(isset($menu))
                     {{ method_field('put') }}
                     @endif
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label required">Tên menu</label>
                              <input type="text" name="name" id="name" class="form-control" value="{{ $menu->name or "" }}">
                           </div>

                           <div class="form-group col-md-6">
                              <label class="control-label required">Link</label>
                              <input type="text" name="link" class="form-control" value="{{ $menu->link or "" }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label">Menu cha</label>
                              <select class="form-control select2" name="parent_id" data-placeholder="Danh mục cấp cao nhất">
                                 <option></option>
                                 {!! $menus !!}
                              </select>
                           </div>

                           <div class="form-group col-md-6">
                              <label class="control-label required">Vị trí</label>
                              <input type="number" name="position" class="form-control" value="{{ $menu->position or ""}}" min="0">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="control-label required">Trạng thái</label>
                                 <select class="form-control select2" name="active">
                                    <option value="1" {{ isset($menu)  && $menu->active == 1 ? 'selected' : ''}}>Hiển thị</option>
                                    <option value="0" {{ isset($menu)  && $menu->active == 0 ? 'selected' : ''}}>Ẩn</option>
                                 </select>
                           </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                           <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                           <a href="{{ url('admin/menu') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
   <script>
      $("#form").validate({
         rules: {
            name: {
               required: true,
               normalizer: function(value) {
                  return $.trim(value);
               }
            },
            link: {
               required: true,
               url:true,
               normalizer: function(value) {
                  return $.trim(value);
               }
            },
            position: {
               required: true,
               digits: true,
               min:0
            },
            active: "required"
         },
            messages: {
               name: 'Chưa nhập tên',
               link: {
                  required: "Chưa nhập link",
                  url: "Url nhập không đúng"
               },
               position:{
                  required: "Chưa chọn vị trí",
                  digits: "Không được nhập chữ",
                  min: "Không được nhập số nhỏ hơn 0"
               },
               active: "Chưa chọn trạng thái"
            }
      });
   </script>
@endsection