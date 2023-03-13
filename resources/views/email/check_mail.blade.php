

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="card">
  <h5 class="card-header">Hello {{$customer->name}}</h5>
  <div class="card-body">
    <h5 class="card-title">Để kích hoạt lại tài khoản vui lòng nhấn đặt lại mật khẩu bên dưới!</h5>
    <a style="text-decoration:none;background-color:#FD8C67;color:white;border-radius: 25px;font-size:20px;" href="{{route('customer.getPass',['customer'=>$customer->id,'token'=>$customer->token])}} " >Đặt lại mật khẩu</a>
    
  </div>
</div>
</body>
</html>