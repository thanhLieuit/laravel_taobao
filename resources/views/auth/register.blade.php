@extends('frontend.masters')
@section('main')
@section('title','Danatao | Đăng nhập ')
<div style="  border-bottom: 1px solid #fff;" class="element02">
  <img style="width: 100%;height: 80px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
    </div>

<section>
     <center>
    <br>
 <div id="id01" class="login1">
    <h3 style="color: #EB4D4B;margin-top: 60px;text-transform: uppercase;">Đăng nhập</h3>

                    <form class="form-horizontal" method="POST" action="{{ route('dangky') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">HỌ & TÊN</label>

                           
                                <input id="name" type="text" class="form-control nhap1" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                      

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" control-label">ĐỊA CHỈ EMAIL</label>

                           
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">MẬT KHẨU</label>

                           
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group">
                            <label for="password-confirm" class=" control-label">XÁC NHẬN MẬT KHẨU</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                        <div class="form-group">       
                                <button style="width: 20%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;" type="submit" class="btn btn-primary">
                                    ĐĂNG KÝ
                                </button><br>

                    </form>
</div>
                       <a style="color: #fff" href="{{ route('login') }}"><button style="width: 30%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;"> ĐĂNG NHẬP</button></a>
</section>
    <section style="    border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@endsection
