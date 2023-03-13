<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dangki.css">
</head>

<body>
    <div class="register-photo">
        @if(session('message'))
        <span class="aler alert-danger">
            <strong>{{session('message') }}</strong>
        </span>
        @endif
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="Regist"method="post">
            @csrf
                <h2 class="text-center"><strong>Đăng kí</strong> </h2>
                <div class="form-group">
                    <input class="form-control" value="{{old('name')}}" type="text" name="name" placeholder="Tên đăng nhập">
                    @if($errors->has('name'))
			<strong style="color:red;">{{ $errors->first('name') }}</strong>
			@endif
                </div>
                <div class="form-group">
                    <input class="form-control" value="{{old('email')}}"type="email" name="email" placeholder="Email">
                    @if($errors->has('email'))
			<strong style="color:red;">{{ $errors->first('email') }}</strong>
			@endif
                </div>
                <div class="form-group">
                    <input class="form-control" value="{{old('password')}}" type="password" name="password" placeholder="Mật khẩu">
                    @if($errors->has('password'))
			<strong style="color:red;">{{ $errors->first('password') }}</strong>
			@endif
                </div>
                <div class="form-group">
                    <input class="form-control" value="{{old('password_repeat')}}" type="password" name="password_repeat" placeholder="Nhập lại mật khẩu">
                    @if($errors->has('password'))
			<strong style="color:red;">{{ $errors->first('password') }}</strong>
			@endif
                </div>
               

                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">Tôi đồng ý với điều khoản cho phép</label></div>
                </div>
                <input type="hidden" name="role" value="1">
                <input type="hidden" name="status" value="1">
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Đăng ký</button>
                </div><a href="/login" class="already">Bạn đã có tài khoản? Đăng Nhập</a></form>
        </div>
    </div>
    
</body>

</html>