@extends('backend.layout.index')

@section('content')
	 <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="row m-b-20">
                    <div class="col-sm-6">
                        <a href="{{ url('admin/news-comment/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới bình luận <i class="mdi mdi-plus-circle-outline"></i></a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <form action="{{ url('admin/news-comment') }}" class="form-inline text-right">
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
                            <th class="text-center">ID</th>
                            <th class="text-center">Tên người bình luận</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Nội Dung</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($news_comment))
                        @foreach($news_comment as $ne)
                        <tr>
                            <td>{{ $ne->id }}</td>
                            <td>{{ $ne->name }}</td>
                            <td class="text-center">
                            	@if($ne->status)
                            		<label class="label label-success">Đã kiểm duyệt</label>
                            	@else
                            		<label class="label label-warning">Chưa kiếm duyệt</label>
                            	@endif
                            </td>
                            <td>{{ $ne->content }}</td>
                            <td class="text-center">
                            	<div class="hidden">{!! $ne->content !!}</div>
                            	@if($ne->status)
                            		<a href="javascript:void(0)" class="btn btn-warning check" title="Bỏ kiểm duyệt" data-id="{{ $ne->id }}" data-status="{{ $ne->status }}">
	                                    <i class="fa fa-thumbs-o-down"></i>
	                                </a>
                            	@else
                            		<a href="javascript:void(0)" class="btn btn-success check" title="Kiểm duyệt" data-id="{{ $ne->id }}" data-status="{{ $ne->status }}">
	                                    <i class="fa fa-thumbs-o-up"></i>
	                                </a>
                            	@endif
                            	<a href="javascript:void(0)" class="btn btn-info detail" data-toggle="modal" data-target="#news-comment" title="Xem chi tiết">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger delete" title="{{ __('table.delete') }}" data-url="{{ url('admin/news-comment/' . $ne->id) }}">
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
                        <div class="page-info m-t-20 m-b-20">Tổng cộng {{ $news_comment->total() }} kết quả</div>
                    </div>
                    <div class="text-right">{{ $news_comment->appends(['search' => request()->search ])->links() }}</div>
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
						table: 'news_comment',
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