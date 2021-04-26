@extends('backend.master')
@section('main')
<div class="container">
	<div class="col-md-12">
		<br>
		<br>
		<form action="" method="POST" role="form">
        @csrf
    
         <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tỷ giá') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="tygia" value="" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Ngày thêm</label>
            <div class="col-md-6">
                <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="nt">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Thêm
                </button>
            </div>
        </div>
	
    </form>
    <br>
		<div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Bảng Tỷ giá</h4>
                               
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>tỷ giá</th>
                                                <th>Ngày thêm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($thongso as $thongso)
                                            <tr>
                                                <td>{{$thongso->tygia}}</td>
                                                <td>{{$thongso->ngaythem}}</td>
                                              
                                            </tr>
                                       		@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        </div>
	</div>
</div>
@endsection