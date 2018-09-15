@extends('backend.layout.index')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
         <div class="row m-b-20">
            <div class="col-sm-6">
               <a href="{{ url('admin/contact/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới liên hệ <i class="mdi mdi-plus-circle-outline"></i></a>
            </div>
            <div class="col-xs-12 col-md-6">
               <form action="{{ url('admin/contact') }}" class="form-inline text-right">
                  <span class="input-icon icon-right">
                     <input type="text" value="{{request()->search ?: "" }}"  class="form-control" name="search" placeholder="Tên liên hệ">
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
                     <th class="text-center">Tên</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Tiêu đề</th>
                     <th class="text-center">Hành động</th>
                  </tr>
               </thead>
               <tbody>
                  @if(count($contact))
                  @foreach($contact as $item)
                  <tr>
                     <td class="text-center">{{ $item->id }}</td>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->subject }}</td>
                     <td class="text-center">
                        <a href="{{ url('admin/contact/' . $item->id . '/edit') }}" class="btn btn-success" title="Sửa">
                        <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/contact/' . $item->id) }}">
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
               <div class="page-info m-t-20 m-b-20">Tổng cộng {{ $contact->total() }} kết quả</div>
            </div>
            <div class="col-xs-6 text-right">{{ $contact->appends(['search' => request()->search ])->links() }}</div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->
@endsection