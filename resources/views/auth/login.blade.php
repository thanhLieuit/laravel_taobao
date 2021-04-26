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
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            <div >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">Password</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button style="width: 30%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;" type="submit" class="btn btn-primary">
                                ĐĂNG NHẬP
                                </button>
                            </div>
                        </div>
                    </form>
   <a style="color: #fff" href="{{ route('register') }}"><button style="width: 20%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;"> ĐĂNG KÝ</button></a>
   <h3>Đăng nhập nhanh với tài khoản:</h3>
          <div class="dnn">
             <a href="redirect/facebook"><button  id="face1" type="button"> <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;Facebook</button></a>
              <a href="redirect/google"><button  id="gmail1" type="button"> <i class="fa fa-google" aria-hidden="true"></i>&nbsp;&nbsp;Gmail</button></a>
             <br>   
 </div>
</div>
 </center>
</section>
    <section style="    border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@endsection
