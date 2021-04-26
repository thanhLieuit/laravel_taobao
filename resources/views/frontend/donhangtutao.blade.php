@extends('frontend.masters')
@section('main')
@section('title','Danatao | Đơn hang tự tạo ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
		<h1>Trang đơn hàng</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>Trang đơn 	hàng</p>
			</div>
		</center>
	</div>
</div>
<br>
<section>
	<div class="container">
		<div class="table-responsive m-t-40">
                        <table id="example1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">thanh toán</th>
                                   
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">thanh toán</th>
                            
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($usertt as $usertt)
                                <tr>
                                     <td><a  href="{!!url('chitietdonhangtutao')!!}/{{$usertt->id}}" class="btn btn-large btn-block " style="margin-left: -52px;">{{$usertt->madonhang}}</a></td>
                                    <td>{{$usertt->created_at}}</td>
                                    <td>{{$usertt->hoten}}</td>
                                    <td>{{$usertt->status}}</td>
                                    <td>@if($usertt->coc == 0)
                                        <i class="fa fa-circle-o-notch fa-spin" style="margin-left: 41px;"></i>
                                        @elseif($usertt->coc < $usertt->totalqty   )
                                        <i class="fa fa-adjust" aria-hidden="true" style="margin-left: 41px;"></i>
                                        @elseif($usertt->coc == $usertt->totalqty )
                                        <i class="fa fa-circle" aria-hidden="true" style="margin-left: 41px;"></i>
                                        @endif
                                    </td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
	</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
	@stop