@extends('backend.layout.index')

@section('style')
   <!-- Nestable css -->
    <link href="plugins/nestable/jquery.nestable.css" rel="stylesheet" />
    <style>
      /* nestable */
       .dd-item a {
           margin-left: 10px;
       }
    </style>
@endsection

@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
         <div class="row m-b-20">
            <div class="col-md-12 col-xs-12">
               <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#add-modal">Thêm mới</button>
               <button type="button" class="btn btn-pink waves-effect waves-light" id="expand-all">Mở rộng tất cả</button>
               <button type="button" class="btn btn-purple waves-effect waves-light" id="collapse-all">Thu gọn tất cả</button>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 col-xs-12">
               <div class="custom-dd-empty dd">
                  {!! $nestable !!}
               </div>
            </div><!-- end col -->

         </div> <!-- end row -->
      </div>
   </div>
</div>

<div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
         <form id="add-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Thêm Mới Menu</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="row">
                   <div class="col-xs-12">
                     <div class="form-group">
                          <label class="control-label required">Tên Menu</label>
                          <input type="text" name="name" id="new-name" class="form-control">
                      </div>
                   </div>
               </div>
            <div class="row">
                   <div class="col-xs-12">
                     <div class="form-group">
                          <label class="control-label">Link</label>
                          <input type="text" name="link" id="new-link" class="form-control">
                      </div>
                   </div>
                </div>
            
            <div class="row">
                   <div class="col-xs-6">
                     <div class="form-group">
                        <label class="control-label">Menu cha</label>
                        <select name="parent_id" id="new-parent" class="form-control select2" data-placeholder="Danh mục cấp cao nhất">
                               <option></option>
                               {!! $menus !!}
                        </select>
                       </div>
                   </div>

                   <div class="col-xs-6">
                     <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <select class="form-control" id="new-status" name="status" data-placeholder="Chọn trạng thái hiển thị">
                               <option value="1">Có</option>
                               <option value="0">Không</option>
                        </select>
                       </div>
                   </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-info waves-effect waves-light" id="add">OK</button>
            </div>
         </form>
        </div>
    </div>
</div><!-- /.modal -->

<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
         <form id="edit-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Chỉnh Sửa Menu</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="row">
                   <div class="col-xs-12">
                     <div class="form-group">
                          <label class="control-label required">Tên Menu</label>
                          <input type="text" name="name" id="edit-name" class="form-control">
                      </div>
                   </div>
               </div>
            <div class="row">
                   <div class="col-xs-12">
                     <div class="form-group">
                          <label class="control-label">Link</label>
                          <input type="text" name="link" id="edit-link" class="form-control">
                      </div>
                   </div>
                </div>
            
            <div class="row">
                   <input type="hidden" id="edit-parent" name="parent_id">

                   <div class="col-xs-12">
                     <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <select class="form-control" id="edit-status" name="status" data-placeholder="Chọn trạng thái hiển thị">
                               <option value="1">Có</option>
                               <option value="0">Không</option>
                        </select>
                       </div>
                   </div>
                </div>

            </div>
            <input type="hidden" id="edit-id">
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-info waves-effect waves-light" id="edit">OK</button>
            </div>
         </form>
        </div>
    </div>
</div><!-- /.modal -->
@endsection

@section('script')
<!--script for this page only-->
<script src="plugins/nestable/jquery.nestable.js"></script>
<script>

   $("#add-form").validate({
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
         },
         messages: {
            name: 'Chưa nhập tên',
            link: {
               required: "Chưa nhập link",
               url: "Url nhập không đúng"
            },
         },
    });

    $("#edit-form").validate({
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
         },
         messages: {
            name: 'Chưa nhập tên',
            link: {
               required: "Chưa nhập link",
               url: "Url nhập không đúng"
            },
         },
    });

   $('.dd').nestable().on('change', function() {
      $.ajax({
         url : '{{ url('admin/menu/serialize') }}',
         type: 'POST',
         data: {
            data: $('.dd').nestable('serialize')
         },
         success: function(data) {
            window.location.reload();
         }
      });
   });

   $('#add').click(function() {
      if($('#add-form').valid()) {
         $.ajax({
            url : '{{ url('admin/menu') }}',
            type: 'POST',
            data: {
               name: $('#new-name').val(),
               link: $('#new-link').val(),
               parent_id: $('#new-parent').val(),
               status: $('#new-status').val(),
            },
            success: function(data) {
               window.location.reload();
            }
         });
      }
   });

   $('#edit').click(function() {
      if($('#edit-form').valid()) {
         $.ajax({
            url : '{{ url('admin/menu') }}/' + $('#edit-id').val(),
            type: 'POST',
            data: {
               name: $('#edit-name').val(),
               link: $('#edit-link').val(),
               parent_id: $('#edit-parent').val(),
               status: $('#edit-status').val(),
               _method: 'put'
            },
            success: function(data) {
               window.location.reload();
            }
         });
      }
   });

   $('body').on('click', '.edit', function() {
      $.ajax({
         url : '{{ url('admin/menu') }}/' + $(this).data('id'),
         type: 'GET',
         success: function(data) {
            $('#edit-name').val(data.name);
            $('#edit-link').val(data.link);
            $('#edit-description').val(data.description);
            $('#edit-meta-title').val(data.meta_title);
            $('#edit-meta-description').val(data.meta_description);
            $('#edit-status').val(data.status);
            $('#edit-parent').val(data.parent_id);
            $('#edit-id').val(data.id);
         }
      });
   });

   $('#expand-all').click(function() {
      $('.dd').nestable('expandAll');
   });
   $('#collapse-all').click(function() {
      $('.dd').nestable('collapseAll');
   })
</script>
@endsection