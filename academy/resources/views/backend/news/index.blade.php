@extends('backend.layout.index')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="card-box">
	            <div class="row m-b-20">
	                <div class="col-sm-6">
                        <a href="{{ url('admin/news/create') }}" class="btn btn-info waves-effect waves-light">Đăng bài mới <i class="mdi mdi-plus-circle-outline"></i></a>
	                </div>
	                <div class="col-xs-12 col-md-6">
                        <form action="{{ url('admin/news') }}" class="form-inline text-right">
							<span class="input-icon icon-right">
								<input type="text" name="search" class="form-control" value="{{request()->search ?: ''}}">
							</span>
							<button type="submit" class="btn btn-info">Tìm kiếm</button>
                        </form>
                    </div>
	            </div>
	            <div class="table-responsive">
	                <table class="table table-bordered table-colored-bordered table-bordered-custom table-hover table-striped m-0">
	                    <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tiêu đề</th>
	                        <th>Danh mục</th>
	                        <th>Bài nổi bật</th>
	                        <th>Ảnh đại diện</th>
	                        <th>Hành động</th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    @if(count($news))
						@foreach($news as $s)
						<tr>
							<td>{{ $s->id }}</td>
							<td>{{ $s->title }}</td>
							<td>{{ $s->category_id ? $s->category->name : '' }}</td>
							<td>
								@if($s->feature)
								<span class="label label-table label-success">Có</span>
								@else
								<span class="label label-table label-warning">Không</span>
								@endif
							</td>
							<td><img src="{{ $s->getImage() }}" width="160"></td>
							<td>
								<a href="{{ url('admin/news/' . $s->id . '/edit') }}" class="btn btn-success" title="Sửa">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/news/' . $s->id) }}">
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
	                	<div class="page-info m-t-20 m-b-20">Tổng cộng {{ $news->total() }} kết quả</div>
	                </div>
	                <div class="col-xs-6 text-right">{{ $news->appends(['search' => request()->search ])->links() }}</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection