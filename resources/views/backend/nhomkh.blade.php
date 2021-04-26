@extends('backend.master')
@section('main')

<div class="container">
	<div class="qv">
		<a href="{{route('admin/khachhang/danhsachnhomkhachhang')}}">Danh sách nhóm khách hàng</a>
	</div>
	<div class="col-md-6">
                        <div class="card card-block">
                            <h3 class="box-title m-b-0">nhóm khách hàng</h3>
                           
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" enctype="multipart/form-data" method="post" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên nhóm</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên nhóm" name="tn">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã nhóm</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã nhóm" name="mn">
                                        </div>
                                      	 <div class="form-group">
                                            <label for="exampleInputEmail1">mô tả</label>
                                            <br>
                                            <textarea id="w3mission" rows="4" cols="50" name="mota">
											</textarea>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tạo</button>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection