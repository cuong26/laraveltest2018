<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('/public/boot/css/bootstrap.css')}}" />
	<script src="{{asset('/public/boot/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('/public/boot/js/bootstrap.js')}}"></script>
	<style type="text/css">
		body{font-family: arial ;
			font-size: 15px;}
		
		#header{background: #ffffff;
			height: 120px}
		#contain{background: #e9eaea;
			height: 2050px;}
			.menu ul {float: left;}
			#coctain{
				margin-top: 30px;
			height: 40px; }
			#coctain1{background:#ffffff;
						height: 80px;
						margin-bottom: 30px; }
			#coctain2{background:#fff;
				height:1869px }			
		#footer{background: #222428;
			height: 300px;}
	</style>

</head>
<body>
</div>
	<div id="header" class="row">
		<div class="container">
			<div class="row">
			<div id="logo" class="col-md-10 col-sm-12 col-xs-12"><a href=""><span class="glyphicons glyphicons-call-redirect"></span> </a></div>
			<div id="logo" class="col-md-1 col-sm-12 col-xs-12"><a href="">Đăng Nhập</a></div>
			<div id="logo" class="col-md-1 col-sm-12 col-xs-12"><a href="">Đăng Ký</a></div>
			<div id="logon" class="col-md12 col-sm-12 col-xs-12"><img src="{{asset('/public/baiviet/logo.png')}}"></div>
			<div id="menu"> 
					
			</div>
				
			</div>
		</div>
	</div>
	<div id="contain" class="row">
		<div class="container">
			<div class="row">
				<div id="coctain" class="container">
					<div class="row">
						
					</div>
				</div>
				<div id="coctain1" class="container">
					<div class="row">cxgf</div>
				</div>
				<div id="coctain2" class="container">
					<div class="row">  {!!  $users->noidung 	!!}</div>
				</div>

			</div>
			
		</div>
	</div>
	<div id="footer" class="row">
		<div class="container">
			<div class="row">
				<div id="qc" class="col-md-3 col-sm-12 col-xs-12"><a href="">Trang Tin tuc</a></div>
				<div id="qc" class="col-md-3 col-sm-12 col-xs-12"><a href="">Trang Tin tuc</a></div>
				<div id="qc" class="col-md-3 col-sm-12 col-xs-12"><a href="">Trang Tin tuc</a></div>
				<div id="qc" class="col-md-3 col-sm-12 col-xs-12"><a href="">Trang Tin tuc</a></div>
				
			</div>
		</div>
	</div>
</div>	
</body>
</html>