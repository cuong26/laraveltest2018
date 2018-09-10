<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.table  {
			border: 1px solid #ddd ;
			align-items: center;
			width: 100%;
		}
		.cot{
			border-bottom:  1px solid #ddd ;
			width: 50%;
		}
		th, td {
			border: 1px solid #ddd;
		}
		td {
			text-align: center;
		}
		.register{
			float: right;
		}


	</style>
</head>
<body>
	<table class="table">
		<tr class="cot">
			<th> <h3>Tên </h3> </th>
			<td> <h3>Tuổi</h1> </td>
			<td> <h3>Khóa học</h1> </td>
			<td> Sửa </td>
			<td> Xóa </td>
		</tr>

		@foreach ($getinfo as $getinfo)

		<tr>
			<td>  {{ $getinfo -> TEN }} </td>
			<td>  {{ $getinfo -> TUOI }} </td>	
			<td>  {{ $getinfo -> KHOAHOC }} </td>
			<td> <a href="edit/{{ $getinfo ->id }}">Edit</a> </td>
			<td> <a href=" dltsv/{{ $getinfo ->id }} " onClick="return confirm('Bạn vẫn muốn xóa chứ?')">Delete</a> </td>
		</tr>
		@endforeach

		
	</table>
	<a href="/dangky" class="register"> Đăng ký </a>
</body>
</html>	