@extends('backend.layout.index')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card-box">
         <div class="row m-b-20">
            <div class="col-sm-6">
               <a href="{{ url('admin/testimonial/create') }}" class="btn btn-info waves-effect waves-light">Thêm mới nhận xét <i class="mdi mdi-plus-circle-outline"></i></a>
            </div>
            <div class="col-xs-12 col-md-6">
               <form action="{{ url('admin/testimonial') }}" class="form-inline text-right">
                  <span class="input-icon icon-right">
                     <input type="text" value="{{request()->search ?: "" }}"  class="form-control" name="search" placeholder="Tên Nhận Xét">
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
                     <th class="text-center">Thông Tin</th>
                     <th class="text-center">Nội Dung</th>
                     <th class="text-center">Hành động</th>
                  </tr>
               </thead>
               <tbody>
               @if(count($testimonial))
                  @foreach($testimonial as $item)
                     <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->info }}</td>
                        <td>{{ $item->content }}</td>
                        <td class="text-center">
                           <a href="{{ url('admin/testimonial/' . $item->id . '/edit') }}" class="btn btn-success" title="Sửa">
                              <i class="fa fa-pencil"></i>
                           </a>
                           <a href="javascript:void(0)" class="btn btn-danger delete" title="Xóa" data-url="{{ url('admin/testimonial/' . $item->id) }}">
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
               <div class="page-info m-t-20 m-b-20">Tổng cộng {{ $testimonial->total() }} kết quả</div>
            </div>
            <div class="col-xs-6 text-right">{{ $testimonial->appends(['search' => request()->search ])->links() }}</div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->
@endsection