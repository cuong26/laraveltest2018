<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
</head>
<body>
	<form action=" /edit/{{ $getinfo2 ->id }} " method="post">
	    <p>Họ tên: <input type="text" name="fullname" value=" {{ $getinfo2 -> TEN }} "> </p>
	    <p>Tuổi: <input type="text" name="tuoi" value=" {{ $getinfo2 -> TUOI }} "> </p>
	    <p>Khóa học: <input type="text" name="khoahoc" value=" {{ $getinfo2 -> KHOAHOC }} "> </p>
	    <button type="submit">Gửi</button>
	    {{ csrf_field() }}
	</form>
</body>
</html>