@extends('frontend.masters')
@section('main')
@section('title','Tin Tức | Tin tức Công Ty')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>tin tức <i class="fa fa-angle-right" aria-hidden="true"></i> <span style="font-size: 20px;">tin tức công ty </h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i> tin tức  <i class="fa fa-angle-right" aria-hidden="true"></i> Tin tức công ty</p></div>
	</div>
		</center>
</div>
<section>
	<div class="container tieude">
		<h3 style="text-transform: uppercase;text-align: center;"><a href="{!!url('/tintuc/kinhdoanh')!!}">kinh doanh </a>| <a href="{!!url('/tintuc/giaidap')!!}">giải đáp thắc mắc</a> | <a <a style="border-bottom: 3px solid #707070;"  href="{!!url('/tintuc/congty')!!}">tin tức công ty</a> </h3>
		<div class="row">
			<div class="col-md-9 ttkd">
				@foreach($layct as $laycts)
					<a class="dskd" href="{!!url('tintuc/congty')!!}/{{$laycts->slug}}">
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ttkd3">
								<img src="../img/{{ $laycts->img }}" alt="">
							</div>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ttkd4">
								<h3>{{$laycts->tieude}}</h3>
								<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{$laycts->updated_at}} &nbsp;&nbsp; </p>
								<hr>
								<p>{{$laycts->noidungtt}}</p>
							</div>
						</div>
					</a>
					@endforeach
					<div style="margin-left: 250px">
						{!! $layct->links() !!}
			</div>
		</div>
		<div class="col-md-3 tintuc2">
				<h3>Facebook</h3>
				<div class="tintuc3">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdanatao.qc%2F&tabs=timeline&width=300&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=291397554876889" width="300" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</div>
				<h3>Thống kê truy cập</h3>
				
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong ngày: <span style="color: red"><?php echo $tchn; ?></span></p>
        <p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong hôm qua:  <span style="color: blue"><?php echo $tchq; ?></span></p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong tuần:  <span style="color: green"><?php echo $tctuan; ?></span></p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong tháng: <span style="color: pink"> <?php echo $tcthang; ?></span></p>
        <p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong năm:  <span><?php echo $tcnam; ?></p>

			</div>		
		
</div>
</section>
		<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >

@stop