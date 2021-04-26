@extends('frontend.masters')
@section('main')
@section('title','Tin tức')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>tin tức</h1>
		<center>
			<div class=" hinhthan"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> Tin tức</p></div>
	</div>
		</center>
</div>
	</section>
	<section >
<div class="container tieude" style="padding-top: 59px;">
		<h3 style="text-transform: uppercase;text-align: center;"><a href="{!!url('/tintuc/kinhdoanh')!!}">kinh doanh </a>| <a href="{!!url('/tintuc/giaidap')!!}">giải đáp thắc mắc</a> | <a href="{!!url('/tintuc/congty')!!}">tin tức công ty</a> </h3>
		<div class="row">
			<div class="col-md-9 tin9 ">
				<div class="kinhdoanh">
				<a href="{!!url('/tintuc/kinhdoanh')!!}"> <h3>kinh doanh</h3></a>
				<div class="row">
            <div class="owl-carousel owl-theme">
              @foreach($listdanhmuc1 as $listdanhmuc1)
            <div class="item">
              <div class="item active">
                  <div class="noidungslider">
                    <a href="{!!url('/tintuc/kinhdoanh',['slug'=>$listdanhmuc1->slug])!!}">
                         <div class="class1">
                      <img src="../img/{{ $listdanhmuc1->img }}" alt="">
                      <div class="overlay">
                        <div style="text-transform: uppercase;" class="text">{{$listdanhmuc1->tieude}}</div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              @endforeach

        </div>


  </div>
</div>
<div class="kinhdoanh">
        <a href="{!!url('/tintuc/giaidap')!!}"> <h3>Giải đáp </h3></a>
        <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach($listdanhmuc2 as $listdanhmuc2)
            <div class="item">
              <div class="item active">
                  <div class="noidungslider">
                    <a href="{!!url('/tintuc/giaidap',['slug'=>$listdanhmuc2->slug])!!}">
                         <div class="class1">
                      <img src="../img/{{ $listdanhmuc2->img }}" alt="">
                      <div class="overlay">
                        <div style="text-transform: uppercase;" class="text">{{$listdanhmuc2->tieude}}</div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              @endforeach

        </div>


  </div>
</div>
<div class="kinhdoanh">
        <a href="{!!url('/tintuc/congty')!!}"> <h3>Công ty</h3></a>
        <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach($listdanhmuc3 as $listdanhmuc3)
            <div class="item">
              <div class="item active">
                  <div class="noidungslider">
                    <a href="{!!url('/tintuc/congty',['slug'=>$listdanhmuc3->slug])!!}">
                         <div class="class1">
                      <img src="../img/{{ $listdanhmuc3->img }}" alt="">
                      <div class="overlay">
                        <div style="text-transform: uppercase;" class="text">{{$listdanhmuc3->tieude}}</div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              @endforeach

        </div>


  </div>
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

	</div>	
	</section>





		<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop