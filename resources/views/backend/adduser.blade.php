@extends('backend.master')
@section('main')
<div class="container">
	
	<center><h2 style="text-transform: uppercase;">Thêm người dùng </h2></center>
	<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<h3>Họ & tên</h3>
		<input required type="text" name="name" id="input" class="form-control" value=""><br>
	
		<h3>Email</h3>
		<input required type="Email" name="email" id="input" class="form-control" value=""><br>
		
		<h3>Mật khẩu:</h3>
		<input required type="Password" name="password" id="input" class="form-control" value=""><br>
       
		<h3>Nhập lại mật khẩu:</h3>
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

</div>
<center><button style="margin-top: 20px;text-align: center;" name="slsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center><br>
{{csrf_field()}}
</form>


</div>
@stop