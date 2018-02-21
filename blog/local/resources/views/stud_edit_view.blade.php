@if(Auth::check())

<html>

   <head>
         
      <title>View Student Records</title>

   </head>
<style type="text/css">
   .ast{text-align: center;
         margin-right:  357px;
         margin-top: 20px;}
   .wellcome{text-align: center;}
   h1{color: orange;}
</style>
   <body>
      <div class="wellcome"><h1>Trang Quản Lý Học Sinh</h1></div>
      
<div><a href="{{route('logout')}}">Đăng Xuất</a></div>
      <table border = "1px" width="450px" height="400px" align="center">

         <tr>
            
            <td>ID</td>

            <td>Name</td>

            <td>Sửa</td>
            <td>Xóa</td>


         </tr>

         @foreach ($users as $user)

         <tr>

            <td>{{ $user->id }}</td>

            <td>{{ $user->name }}</td>

            <td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
            <td><a href= 'delete/{{ $user->id }}'onclick='return myFunction();'>Delete</a></td>

         </tr>
        

         @endforeach
         <script>    
    function myFunction() {
            return confirm('Bạn có chắc chắn muốn xóa?');
        }
  </script>
      </table>
        <div class="ast"> <a href="insert">Thêm Student</a></div>
   </body>

</html>
@else
<h1>Bạn Chưa Đăng Nhập ! Vui Lòng Đăng Nhập </h1>
<a href="/blog/dangnhap">Click Đây Để Đăng Nhập</a>
@endif