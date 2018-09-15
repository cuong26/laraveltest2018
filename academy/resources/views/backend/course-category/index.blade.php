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
                <h4 class="modal-title">Thêm Mới Danh Mục</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label required">Tên danh mục</label>
		                    <input type="text" name="name" id="new-name" class="form-control">
		                </div>
	                </div>
	            </div>
				<div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label">URL thân thiện</label>
		                    <input type="text" name="alias" id="new-alias" class="form-control">
		                </div>
	                </div>
                </div>
				
				<div class="row">
	                <div class="col-xs-6">
	                	<div class="form-group">
	                		<label class="control-label">Danh mục cha</label>
	                		<select name="parent_id" id="new-parent" class="form-control select2" data-placeholder="Danh mục cấp cao nhất">
	                            <option></option>
	                            {!! $categories !!}
	                    	</select>
	                    </div>
	                </div>

	                <div class="col-xs-6">
	                	<div class="form-group">
	                		<label class="control-label">Hiển thị ở trang chủ</label>
	                		<select class="form-control" id="new-status" name="status" data-placeholder="Chọn trạng thái hiển thị">
	                            <option value="1">Có</option>
	                            <option value="0">Không</option>
	                    	</select>
	                    </div>
	                </div>
                </div>
				
				<div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label">Mô tả</label>
		                    <input type="text" name="description" id="new-description" class="form-control">
		                </div>
	                </div>
                </div>
				
				<div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label">Thẻ tiêu đề</label>
		                    <input type="text" name="meta_title" id="new-meta-title" class="form-control">
	                	</div>
	                </div>
            	</div>
				
				<div class="row">
	                <div class="col-xs-12">
	                 	<div class="form-group">
		                    <label class="control-label">Thẻ mô tả</label>
		                    <input type="text" name="meta_description" id="new-meta-description" class="form-control">
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
                <h4 class="modal-title">Chỉnh Sửa Danh Mục</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label required">Tên danh mục</label>
		                    <input type="text" name="name" id="edit-name" class="form-control">
		                </div>
	                </div>
	            </div>
				<div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label">URL thân thiện</label>
		                    <input type="text" name="alias" id="edit-alias" class="form-control">
		                </div>
	                </div>
                </div>
				
				<div class="row">
	                <input type="hidden" id="edit-parent" name="parent_id">

	                <div class="col-xs-12">
	                	<div class="form-group">
	                		<label class="control-label">Hiển thị ở trang chủ</label>
	                		<select class="form-control" id="edit-status" name="status" data-placeholder="Chọn trạng thái hiển thị">
	                            <option value="1">Có</option>
	                            <option value="0">Không</option>
	                    	</select>
	                    </div>
	                </div>
                </div>
				
				<div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label">Mô tả</label>
		                    <input type="text" name="description" id="edit-description" class="form-control">
		                </div>
	                </div>
                </div>
				
				<div class="row">
	                <div class="col-xs-12">
	                	<div class="form-group">
		                    <label class="control-label">Thẻ tiêu đề</label>
		                    <input type="text" name="meta_title" id="edit-meta-title" class="form-control">
	                	</div>
	                </div>
            	</div>
				
				<div class="row">
	                <div class="col-xs-12">
	                 	<div class="form-group">
		                    <label class="control-label">Thẻ mô tả</label>
		                    <input type="text" name="meta_description" id="edit-meta-description" class="form-control">
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
	jQuery.validator.addMethod("friendly_url", function(friendly_url, element) {
        return this.optional(element) || friendly_url.match(/^[A-z0-9.-]+$/);
    }, "Chỉ chấp nhận chữ, số và ký tự -");

	$("#add-form").validate({
        rules: {
            name: {
            	required: true,
            	normalizer: function(value) {
                    return $.trim(value);
                },
            },    
            alias: {
                remote: {
                    url: "{{ url('admin/ajax/check-alias') }}",
                    type: "post",
                    data: {
                        alias: function() {
                            return $( "#new-alias" ).val();
                        },
                        table: 'course_category',
                        id: 0,
                    },
                },
                friendly_url: true,
            }
        },
        messages: {
            name: "Chưa nhập tên",
            alias: {
                remote: "URL đã tồn tại",
            },
        },
    });

    $("#edit-form").validate({
        rules: {
            name: {
            	required: true,
            	normalizer: function(value) {
                    return $.trim(value);
                },
            },
            alias: {
                remote: {
                    url: "{{ url('admin/ajax/check-alias') }}",
                    type: "post",
                    data: {
                        alias: function() {
                            return $( "#edit-alias" ).val();
                        },
                        table: 'course_category',
                        id: function() {
                            return $( "#edit-id" ).val();
                        },
                    },
                },
                friendly_url: true,
            }
        },
        messages: {
            name: "Chưa nhập tên",
            alias: {
                remote: "URL đã tồn tại",
            },
        },
    });

	$('.dd').nestable().on('change', function() {
		$.ajax({
			url : '{{ url('admin/course-category/serialize') }}',
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
				url : '{{ url('admin/course-category') }}',
				type: 'POST',
				data: {
					name: $('#new-name').val(),
					alias: $('#new-alias').val(),
					parent_id: $('#new-parent').val(),
					status: $('#new-status').val(),
					description: $('#new-description').val(),
					meta_title: $('#new-meta-title').val(),
					meta_description: $('#new-meta-description').val(),
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
				url : '{{ url('admin/course-category') }}/' + $('#edit-id').val(),
				type: 'POST',
				data: {
					name: $('#edit-name').val(),
					alias: $('#edit-alias').val(),
					parent_id: $('#edit-parent').val(),
					status: $('#edit-status').val(),
					description: $('#edit-description').val(),
					meta_title: $('#edit-meta-title').val(),
					meta_description: $('#edit-meta-description').val(),
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
			url : '{{ url('admin/course-category') }}/' + $(this).data('id'),
			type: 'GET',
			success: function(data) {
				$('#edit-name').val(data.name);
				$('#edit-alias').val(data.alias);
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