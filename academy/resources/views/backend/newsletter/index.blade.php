@extends('backend.layout.index')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row m-b-20">
                <div class="col-md-6">
                    <a href="{{ url('admin/newsletter/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới đăng ký <i class="mdi mdi-plus-circle-outline"></i></a>
                </div>
                <div class="col-xs-12 col-md-6">
                    <form action="{{ url('admin/newsletter') }}" class="form-inline text-right">
                        <span class="input-icon icon-right">
                            <input type="text" name="search" class="form-control" value="{{request()->search ?: ''}}">
                        </span>
                        <button type="submit" class="btn btn-info">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-bordered table-colored-bordered table-bordered-custom table-hover table-striped m-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($newsletter))
					@foreach($newsletter as $s)
					<tr>
						<td>{{ $s->id }}</td>
						<td>{{ $s->email }}</td>
						<td>
							<a href="{{ url('admin/newsletter/' . $s->id . '/edit') }}" class="btn btn-success" title="Sửa">
								<i class="fa fa-pencil"></i>
							</a>
							<a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/newsletter/' . $s->id) }}">
								<i class="fa fa-times"></i>
							</a>
						</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td class="merge-col" class="text-center">Chưa có dữ liệu</td>
					</tr>
					@endif
                    </tbody>
                </table>
                <div class="col-xs-6 text-left">
                	<div class="page-info m-t-20 m-b-20">Tổng cộng {{ $newsletter->total() }} kết quả</div>
                </div>
                <div class="col-xs-6 text-right">{{ $newsletter->appends(['search' => request()->search ])->links() }}</div>
            </div>
        </div>

    </div>

</div>
<!-- end row -->
@endsection