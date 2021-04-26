@extends('backend.master')
@section('main')

<div class="container">
	<div class="ds">
		<h3><a href="">Đơn hàng</a></h3>
	</div>
	<div class="col-md-12">
		<form action="" enctype="multipart/form-data" method="post" >
	    <input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="row">
		<div class="col-md-8">
			<div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Thông tin khách hàng</h4>
	              
 						<select class="form-control custom-select"  name="khachhang">
                            <option>--Chọn khách hàng--</option>
                            @foreach($thongtinkh as $thongtinkh)
                            <option value="{{$thongtinkh->id}}">{{$thongtinkh->hoten}}</option>
                            @endforeach
	                    </select>
                    
	            </div>
 
	        </div>
	        <br>
	        <div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Thông tin Sản phẩm</h4>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">link sản phẩm</label>
                            <input type="text" id="firstName" class="form-control" placeholder="link sản phẩm" name="note1" value="">
                 
                        </div>
                    </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên sp</label>
                                <input type="text" id="firstName" class="form-control" placeholder="Tên sp" name="name_product" value="">
                     
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">size</label>
                                 <input type="text" id="" class="form-control" placeholder="size"  name="size" value="">
                              
                            </div>
                        </div>
                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">color</label>
                                 <input type="text" id="" class="form-control" placeholder="color"  name="color" value="">
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số lượng</label>
                                <input type="text" id="" class="form-control" placeholder="Số lượng" name="sl" value="">
                     
                            </div>
                            <input type="checkbox" id="vehicle1" name="kh" value="kiểm hàng">
                            <label for="vehicle1"> kiểm hàng</label>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá</label>
                                <input type="text" id="" class="form-control" placeholder="Giá" name="price_product" value="">
                     
                            </div>
                        </div>
                    </div>
	            </div>

	        </div>
		</div>
		<div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Thông tin đơn hàng</h4>
                    @foreach($nhanvien as $nhanvien)
                    <div class="form-group">
                        <label class="control-label">nhân viên</label>
                         <input type="text" id="" class="form-control" placeholder="" name="nv" value="{{$nhanvien->name}}">
                     
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label class="control-label">Chi nhánh</label>
                        <select class="form-control custom-select"  name="chinhanh">
                            <option>--Kho chính--</option>
                            
                            <option value="1">Hà Nội</option>
                            <option value="2">Đà Nẵng</option>
                            <option value="3">Hồ Chí Minh</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Chính sách</label>
                        <select class="form-control custom-select"  name="chinhanh">
                            <option value="1">Giá bán lẽ</option>
                            <option value="2">Giá bán buôn</option>     
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea class="form-control" rows="5" name="ghichu"></textarea>
                    </div>
                </div>
            </div>      
        </div>
		</div>
			<button type="submit" class="btn btn-primary" >tạo đơn</button>

	   </form>
	</div>
</div>


@endsection