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
                                            <label for="exampleInputEmail1">khối lượng thực tế</label>
                                            <input type="text" class="form-control" id="" placeholder="khối lượng thực tế" name="kltt"  value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">chiều dài</label>
                                            <input type="text" class="form-control" id="" placeholder="chiều dài" name="cd"  value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">chiều rộng</label>
                                            <input type="text" class="form-control" id="" placeholder="chiều rộng" name="cr"  value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">chiều cao</label>
                                            <input type="text" class="form-control" id="" placeholder="chiều cao" name="cc"  value="">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Ghi chú</label>
                                            <input type="text" class="form-control" id="" placeholder="" name="note"  value="">
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