@extends('backend.master')
@section('main')
<div class="container">
	<div class="qv">
		<a href="{{route('admin/khachhang/danhsachkhachhang')}}">Danh sách khách hàng</a>
	</div>

	<div class="col-md-12">
		<form action="{{route('admin/khachhang/themkhachhang')}}" enctype="multipart/form-data" method="post" >
		    <input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
	            <div class="col-lg-8">
	                        <div class="card card-outline-info">
	                            <div class="card-header">
	                                <h4 class="m-b-0 text-white">Thêm mới khách hàng</h4>
	                            </div>
	                            <div class="card-block">
	                                
	                                    <div class="form-body">
	                                        <h3 class="card-title">Thông tin chung</h3>
	                                        <hr>
	                                        <div class="row p-t-20">
	                                            <div class="col-md-6">
	                                                <div class="form-group">
	                                                    <label class="control-label">Họ Tên</label>
	                                                    <input type="text" id="firstName" class="form-control" placeholder="Họ Tên" name="ht">
	                                         
	                                                </div>
	                                            </div>
	                                            <!--/span-->
												<div class="col-md-6">
	                                                <div class="form-group">
	                                                    <label class="control-label">Email</label>
	                                                    <input type="text" id="" class="form-control" placeholder="Email" name="email" name="email">
	                                         
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!--/row-->
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <div class="form-group has-success">
	                                                    <label class="control-label">Giới Tính</label>
	                                                    <select class="form-control custom-select" name="gt">
	                                                        <option value="nam">Nam</option>
	                                                        <option value="nữ">Nữ</option>
	                                                    </select>
	                                                  
	                                                </div>
	                                            </div>
	                                            <!--/span-->
	                                            <div class="col-md-6">
	                                                <div class="form-group">
	                                                    <label class="control-label">Ngày Sinh</label>
	                                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date">
	                                                </div>
	                                            </div>
	                                            <!--/span-->
	                                        </div>
	                                        <!--/row-->
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <div class="form-group">
	                                                    <label class="control-label">Điện thoại</label>
	                                                    <input type="text" id="" class="form-control" placeholder="Điện thoại" name="sdt">
	                                         
	                                                </div>
	                                            </div>
	                                            <!--/span-->
	                                            <div class="col-md-6">
	                                                <div class="form-group">
	                                                    <label class="control-label">Facebook</label>
	                                                    <input type="text" id="" class="form-control" placeholder="Facebook" name="fb">
	                                         
	                                                </div>
	                                            </div>
	                                            <!--/span-->
	                                        </div>
	                                        <!--/row-->
	                                        <h3 class="box-title m-t-40">Thông tin địa chỉ</h3>
	                                        <hr>
	                                        <div class="row">
	                                            <div class="col-md-6 ">
	                                                <div class="form-group">
	                                                    <label>địa chỉ</label>
	                                                    <input type="text" class="form-control" name="dc">
	                                                </div>
	                                            </div>
	                                  
	                                        
	                                            <div class="col-md-6">
	                                                <div class="form-group">
	                                                    <label>thành phố</label>
	                                                    <input type="text" class="form-control" name="tp">
	                                                </div>
	                                            </div>
	                                            <!--/span-->
	                                           
	                                        </div>
	                                       
	                                    </div>
	                                    
	                                
	                            </div>
	                        </div>
	            </div>
	            <div class="col-lg-4">
	            	<div class="card card-outline-info">
	            		<div class="card-header">
	                    	<h4 class="m-b-0 text-white">Thông tin khác</h4>
	                	</div>
	                	<div class="col-md-12">
	                        <div class="form-group">
	                            <label>Nhân viên phụ trách</label>
	                            <select class="form-control custom-select"  name="nv">
	                                <option>--Chọn nhân viên--</option>
	                                @foreach($admin as $admin)
	                                <option value="{{$admin->id}}">{{$admin->name}}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>Nhóm khách hàng</label>
	                            <select class="form-control custom-select"  name="nk">
	                                <option>--Chọn nhóm khách hàng--</option>
	                                @foreach($nhomkh as $nhomkh)
	                                <option value="{{$nhomkh->id}}">{{$nhomkh->tennhom}}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>Mô tả</label>
	                            <input type="text" class="form-control" name="note">
	                        </div>
	                    </div>
	            	</div>
	            </div>
	            <div class="form-actions">
	           		<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
	            	<button type="button" class="btn btn-inverse">Cancel</button>
	        	</div>
	        </div>
			
		</form>
	</div>
</div>
@endsection