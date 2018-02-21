
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Đăng Nhập-Test</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{asset('/public/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('/public/css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('/public/css/matrix-login.css')}}" />
        <link href="{{asset('/public/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">        
            <form id="login" class="form-vertical" action="{{route('login')}}" method="POST">
                 <h3><img src="{{asset('/public/img/logo.png')}}" alt="Logo" /></h3>
            <legend>Login</legend>
                    @if($errors->has('errorlogin'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$errors->first('errorlogin')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <p style="color:red">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        @if($errors->has('password'))
                            <p style="color:red">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                
                    
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
          {!! csrf_field() !!}
            </form>
        </div>
        
        
    </body>

</html>
