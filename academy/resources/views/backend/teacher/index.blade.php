@extends('backend.layout.index')
@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="row m-b-20">
                    <div class="col-sm-6">
                        <a href="{{ url('admin/teacher/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới giảng viên <i class="mdi mdi-plus-circle-outline"></i></a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <form action="{{ url('admin/teacher') }}" class="form-inline text-right">
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
                            <th class="text-center">Tên giảng viên</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Chức Vụ</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($teacher))
                        @foreach($teacher as $s)
                        <tr>
                            <td class="text-center">{{ $s->id }}</td>
                            <td class="text-center">{{ $s->name }}</td>
                            <td class="text-center"><img src="{{ $s->getImage() }}" width="160"></td>
                            <td class="text-center">{{ $s->position }}</td>
                            <td class="text-center">
                                <a href="{{ url('admin/teacher/' . $s->id . '/edit') }}" class="btn btn-success" title="Sửa">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/teacher/' . $s->id) }}">
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
	                	<div class="page-info m-t-20 m-b-20">Tổng cộng {{ $teacher->total() }} kết quả</div>
	                </div>
                    <div class="text-right">{{ $teacher->appends(['search' => request()->search ])->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection