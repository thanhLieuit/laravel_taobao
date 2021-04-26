@extends('frontend.masters')
@section('main')
@section('title','Danatao | Công cụ đặt hàng')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
		<h1>Công Cụ Đặt Hàng</h1>
		<center>
			<div class=" hinhthan1 hinhthan ccdh1"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> Công Cụ Đặt Hàng</p></div>
		</div>
	</center>
</div>
</section>
<section id="tuyendung">
	<div class="container ">
		<div class="row">
			<div class="col-md-9 cuongcu ">
				<p>Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<h3>Lorem ipsum 1:</h3>
				<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. <br>
Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium xconsequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. </p>
				<img src="{!!url('img/dathang.jpg')!!}" alt="">
				<h3>Lorem ipsum 2:</h3>
				<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. <br>
Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium xconsequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. </p>
				<img src="{!!url('img/dathang.jpg')!!}" alt="">
				<h3>Lorem ipsum 3:</h3>
				<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. <br>
Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium xconsequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. </p>
				<img src="{!!url('img/dathang.jpg')!!}" alt="">
				<h3>Lorem ipsum </h3>
				<iframe width="100%" height="315" src="https://www.youtube.com/embed/Qfo8R8I_SII" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<p>Nunc vestibulum mollis eros sed malesuada. Nam vitae laoreet augue, id euismod odio. Nam luctus est nec dolor placerat viverra.</p>

				
				
		</div>
		<div class="col-md-3 congcu1">
			<div class="sdt">
					<h3>chăm sóc khách hàng</h3>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
				</div>
			<h3>Facebook</h3>
			<div class="tintuc3">
				<div class="fb-page" data-href="https://www.facebook.com/patict.vn/" data-tabs="timeline" data-width="300" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/patict.vn/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/patict.vn/">PAT Co.,Ltd</a></blockquote></div>
				</div>
				<h3>Thống kê truy cập</h3>
				
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong ngày: <span style="color: red"><?php echo $tchn; ?></span></p>
        <p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong hôm qua:  <span style="color: blue"><?php echo $tchq; ?></span></p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong tuần:  <span style="color: green"><?php echo $tctuan; ?></span></p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong tháng: <span style="color: pink"> <?php echo $tcthang; ?></span></p>
        <p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; truy cập trong năm:  <span><?php echo $tcnam; ?></p>
			</div>
		</div>
		
</div>
</section>
		<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop