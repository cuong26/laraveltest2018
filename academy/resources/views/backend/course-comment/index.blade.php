@extends('backend.layout.index')

@section('content')
	 <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="row m-b-20">
                    <div class="col-sm-6">
                        <a href="{{ url('admin/course-comment/create') }}" class="btn btn-info waves-effect waves-light">Thêm Mới Bình Luận Khóa Học <i class="mdi mdi-plus-circle-outline"></i></a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <form action="{{ url('admin/course-comment') }}" class="form-inline text-right">
                            <span class="input-icon icon-right">
                                <input type="text" name="search" class="form-control" value="{{request()->search ?: ''}}">
                            </span>
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-colored-bordered table-bordered-custom m-0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người bình luận</th>
                            <th>Khóa học</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Link</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($courseComment))
                        @foreach($courseComment as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->course_id }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                            	@if($item->status)
                            		<label class="label label-success">Đã kiểm duyệt</label>
                            	@else
                            		<label class="label label-warning">Chưa kiếm duyệt</label>
                            	@endif
                            </td>
                            <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                            <td>   
                            	<div class="hidden">{!! $item->content !!}</div>
                            	@if($item->status)
                            		<a href="javascript:void(0)" class="btn btn-warning check" title="Bỏ kiểm duyệt" data-id="{{ $item->id }}" data-status="{{ $item->status }}">
	                                    <i class="fa fa-thumbs-o-down"></i>
	                                </a>
                            	@else
                            		<a href="javascript:void(0)" class="btn btn-success check" title="Kiểm duyệt" data-id="{{ $item->id }}" data-status="{{ $item->status }}">
	                                    <i class="fa fa-thumbs-o-up"></i>
	                                </a>
                            	@endif
                            	<a href="javascript:void(0)" class="btn btn-info detail" data-toggle="modal" data-target="#news-comment" title="Xem chi tiết">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger delete" title="{{ __('table.delete') }}" data-url="{{ url('admin/course-comment/' . $item->id) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="merge-col text-center">Chưa có dữ liệu</td>
                        </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="col-xs-6 text-left">
                        <div class="page-info m-t-20 m-b-20">Tổng cộng {{ $courseComment->total() }} kết quả</div>
                    </div>
                    <div class="text-right">{{ $courseComment->appends(['search' => request()->search ])->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="news-comment" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Nội dung bình luận</h4>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
	<script>
		$('body').on('click', '.check', function() {
			var id = $(this).data('id');
			var status = $(this).data('status');
			swal({
                title: 'Bạn có chắc muốn thay đổi trạng thái bình luận này?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy'
            }).then(function () {
				$.ajax({
					url: '{{ url('admin/ajax/check-comment') }}',
					data: {
						table: 'course_comments',
						id: id,
						status: status 
					},
					success: function(data) {
						window.location.reload()
					}
				});
			});
		})
		$('body').on('click', '.detail', function() {
			var html = $(this).closest('td').find('.hidden').html();
			$('#modal-body').html(html);
		});
	</script>
@endsection