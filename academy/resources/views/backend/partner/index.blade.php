@extends('backend.layout.index')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="row m-b-20">
                    <div class="col-sm-6">
                        <a href="{{ url('admin/partner/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới đối tác <i class="mdi mdi-plus-circle-outline"></i></a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <form action="{{ url('admin/partner') }}" class="form-inline text-right">
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
                            <th>Tên đối tác</th>
                            <th>Ảnh</th>
                            <th>Link</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($partner))
                        @foreach($partner as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->name }}</td>
                            <td><img src="{{ $s->getLogo() }}" width="160"></td>
                            <td><a href="{{ $s->link }}" target="_blank">{{ $s->link }}</a></td>
                            <td>
                                <a href="{{ url('admin/partner/' . $s->id . '/edit') }}" class="btn btn-success" title="Sửa">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/partner/' . $s->id) }}">
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
                        <div class="page-info m-t-20 m-b-20">Tổng cộng {{ $partner->total() }} kết quả</div>
                    </div>
                    <div class="text-right">{{ $partner->appends(['search' => request()->search ])->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <style>
        .but-par {
            position: absolute;
            top: 10px;
            right: 50px;
            z-index: 99999;
        }
    </style>
@endsection