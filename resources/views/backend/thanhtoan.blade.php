@extends('backend.master')
@section('main')
<div class="container">
		<div class="col-md-12">
                        <div class="card card-block">
                            <h3 class="box-title m-b-0">Nhập thông tin đơn hàng</h3>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" enctype="multipart/form-data" method="post" >
    									<input type="hidden" name="_token" value="{{csrf_token()}}">
    									@foreach($chitietdonhang as $chitietdonhang)
                                      
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã đơn hàng</label>
                                            <input type="text" class="form-control" id="" placeholder="Mã đơn hàng" value="{{$chitietdonhang->madonhang}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">tiền cọc</label>
                                            <input type="text" class="form-control" id="" placeholder="tiền cọc" name="coc"  value="">
                                        </div>
                                        
                                        @endforeach
                              
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">cập nhật</button>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
	</div>
@endsection