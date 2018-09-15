@extends('backend.layout.index')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
         <div class="row m-b-20">
            <div class="col-sm-6">
               <a href="{{ url('admin/student/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới học viên <i class="mdi mdi-plus-circle-outline"></i></a>
            </div>
            <div class="col-xs-12 col-md-6">
               <form action="{{ url('admin/student') }}" class="form-inline text-right">
                  <span class="input-icon icon-right">
                     <input type="text" value="{{request()->search ?: "" }}"  class="form-control" name="search" placeholder="Tên học viên">
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
                     <th class="text-center">Họ tên</th>
                     <th class="text-center">Ngày sinh</th>
                     <th class="text-center">Giới tính</th>
                     <th class="text-center">Địa chỉ</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Hành động</th>
                  </tr>
               </thead>
               <tbody>
                  @if(count($student))
                  @foreach($student as $item)
                  <tr>
                     <td class="text-center">{{ $item->id }}</td>
                     <td>{{ $item->name }}</td>
                     <td class="text-center">{{ $item->birthday }}</td>
                     <td class="text-center">
                        @if($item->gender)
                           <span>Nam</span>
                        @else
                           <span>Nữ</span>
                        @endif
                     </td>
                     <td>{{ $item->address }}</td>
                     <td>{{ $item->email }}</td>
                     <td class="text-center">
                        <a href="{{ url('admin/student/' . $item->id . '/edit') }}" class="btn btn-success" title="Sửa">
                        <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/student/' . $item->id) }}">
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
               <div class="page-info m-t-20 m-b-20">Tổng cộng {{ $student->total() }} kết quả</div>
            </div>
            <div class="col-xs-6 text-right">{{ $student->appends(['search' => request()->search ])->links() }}</div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->
@endsection