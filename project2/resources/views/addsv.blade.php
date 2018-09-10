<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
</head>
<body>
	<form action=" {{route('addsv') }} " method="post">
	    <p>Họ tên: <input type="text" name="fullname" value=""> </p>
	    <p>Tuổi: <input type="text" name="tuoi" value=""> </p>
	    <p>Khóa học: <input type="text" name="khoahoc" value=""> </p>
	    <button type="submit">Gửi</button>
	    {{ csrf_field() }}
	</form>
</body>
</html>