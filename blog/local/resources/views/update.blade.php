@if(Auth::check())

<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('/public/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('/public/css/bootstrap-responsive.min.css')}}"/>
<link rel="stylesheet" href="{{asset('/public/css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('/public/css/matrix-media.css')}}" />
<link href="{{asset('/public/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="{{asset('/public/ckeditor/ckeditor.js')}}"></script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important"></span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
  <ul>
    <li><a href="index.html"><i class="icon icon-home"></i> <span>Trang Chủ</span></a> </li>
    <li> <a href="http://lrv.vn/blog/dangky"><i class="icon icon-inbox"></i> <span>Đăng Ký </span> <span class="label label-important"></span></a></li>
     <li class=""> <a href="{{ asset('/chel')}}"><i class="icon icon-list"></i> <span>Quản Lý User </span> <span class="label label-important"></span></a></li>
      <li> <a href="http://lrv.vn/blog/dangky"><i class="icon icon-inbox"></i> <span>Thêm Bài Viết </span> <span class="label label-important"></span></a></li>
       <li> <a href="http://lrv.vn/blog/pro"><i class="icon icon-inbox"></i> <span>Quản Lý Bài Viết </span> <span class="label label-important"></span></a></li>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Đăng Ký</a> <a href="#" class="current">Update</a> </div>
    <h1>Update Bài Viết</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Update</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{asset('dltc/'.$users->id)}}" name="basic_validate" id="basic_validate"  novalidate="novalidate"  >
               <input type = "hidden" name = "_token" value = "{{csrf_token()}}">

              <div class="control-group">
                <label class="control-label">Tiêu Đề</label>
                <div class="controls">
                  <input type="text" name="tieude" id="required" value=' {{$users->tieude}}'>
                   @if ($errors->has('tieude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tieude') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Tóm Tắt</label>
                <div class="controls">
                    <textarea name="tomtat" > {{$users->tomtat}}</textarea>
                  
                   @if ($errors->has('tomtat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tomtat') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
                <div class="control-group">
                <label class="control-label">Nội Dung</label>
                <div class="controls">
                  
                 <textarea name="noidung" id="12"> {{$users->noidung}}</textarea>
                  @if ($errors->has('noidung'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noidung') }}</strong>
                                    </span>
                                @endif
                 <script>CKEDITOR.replace('12');</script>
                </div>
              </div>
             
              
              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-success"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

               
              </thead>
              <tbody>
               
              
                <!-- <tr class="odd gradeX">
                  <td>123456</td>
               
                </tr>
                
              -- <tr class="even gradeC">
                  <td>2</td>
                  <td>Liên</td>
                  <td>Lien@gmail.com</td>
                   <td class="center"><a href="">Edit</a></td>
                  <td class="center"><a href="">Delete</a></td>
                </tr>
                <tr class="odd gradeA">
                  <td>3</td>
                  <td>Dũng</td>
                  <td>Dung@gmail.com</td>
                  <td class="center"><a href="">Edit</a></td>
                  <td class="center"><a href="">Delete</a></td>
                </tr>
                <tr class="even gradeA">
                  <td>4</td>
                  <td>Hòa</td>
                  <td>Hoa@yahoo.com</td>
                 <td class="center"><a href="">Edit</a></td>
                  <td class="center"><a href="">Delete</a></td>
                </tr>-->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>


</body>
</html>

@else
  Bạn chưa đăng nhập ! xin vui lòng đăng nhập 
  <a href="{{asset('/dangnhap1')}}">tại đây</a>
@endif  