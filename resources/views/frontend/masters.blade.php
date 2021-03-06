<html>
<head></head>
<meta charset="utf-8">
	<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<link rel="stylesheet" href="{!!url('/css/style.css')!!}">
<link rel="stylesheet" href="{!!url('/css/animation.css')!!}">
<link rel="stylesheet" href="{!!url('css/slideproduct.css')!!}">
<!-- <link rel="stylesheet" href="{!!url('css/responsive.css')!!}"> -->
<link rel="stylesheet" href="{!!url('css/responsive765.css')!!}">
<link rel="stylesheet" href="{!!url('css/responsive768.css')!!}">
<link rel="stylesheet" href="{!!url('css/responsive1024.css')!!}">
<link rel="stylesheet" href="{!!url('css/loader.css')!!}">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap&subset=vietnamese" rel="stylesheet">
<link rel="icon" type="image/png" href="{!!url('img/logo.png')!!}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap.min.css">

<link rel="stylesheet" href="{!!url('css/owl.carousel.min.css') !!}">
<link rel="stylesheet" href="{!!url('css/owl.theme.default.min.css') !!}">
<body class="preloading">
<?php
        use App\Truycap;
        use Carbon\Carbon;
        use App\thongso;
        $dt = Carbon::now()->toDateString();
        $check = DB::table('truycaps')->where('ngay',$dt)->count();

        $update1 = DB::table('truycaps')->where('ngay',$dt)->first();

        if($check == 1)
        {
            $update = Truycap::find($update1->id);
            $update->dem = $update1->dem + 1;

            $update->save();
        }
        else
        {
            $new = New Truycap();
            $new->dem = 1;
            $new->ngay = $dt;
            $new->save();
        }

    $thongso = DB::table('thongsos')->sum('tygia');

        

?>

<section id="modau">
<div class="topnav">
	<div class="container">
		<div class="row">
			<div class="col-md-7"></div>
		@guest
				<div style="padding-top: 5px" class="col-md-5 top1"><p style="color: red;float: left;padding-right: 7px;">T??? gi?? : 1 CNY <img src="{!!url('/img/china.svg')!!}" style="width: 18px;margin-top: -4px;"> = {{$thongso}} VN?? <img src="{!!url('/img/vietnam.svg')!!}" style="width: 18px;margin-top: -4px;"> | </p>
					<a href="{{route('login')}}" style="display: inline-block;"><i class="fa fa-user" aria-hidden="true"></i> ????ng nh???p</a></div>
	    @else
	    		<div style="padding-top: 5px;" class="col-xs-5 col-sm-5 col-md-5 col-lg-5 top1">
	    			<p style="color: red;float: left;padding-right: 7px;">T??? gi?? : 1 CNY <img src="{!!url('/img/china.svg')!!}" style="width: 18px;margin-top: -4px;"> = {{$thongso}} VN?? <img src="{!!url('/img/vietnam.svg')!!}" style="width: 18px;margin-top: -4px;
	"> | </p>
	            <a href="{{ route('canhan')}}">
	                {{ Auth::user()->name }}  <span class="caret"></span>
	            </a>
			 <?php $countcart= DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->count();
	        
	            ?>
	            @if($countcart > 0)
	            <a href="{{ route('giohang') }}">
	            	<i class="fa fa-shopping-cart" style="font-size:20px;x"></i>
	            	<div class="circle"><p><?php echo $countcart; ?></p></div>
				</a>
	            @else
	             <i class="fa fa-shopping-cart" style="font-size:20px;"></i>

	            @endif
	    </div>
	    @endguest


	</div>
</div>
</div>


<div class="zz">
	<div class="element01" >

	<div class="container menu13">
		<center>
			<ul class="menu12" id="menu">
				<a class="btn10">
					<div class="container" onclick="myFunction(this)">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>
					<a class="logo" href="{{ route('/') }}"><img style="width: 175px" src="{!!url('img/LOGO 2.png')!!}" alt=""></a>
				</a>
				<li class="a1"><a href="{{ route('/') }}">Trang ch???</a></li>
				<li><a href="{{ route('gioithieu') }}">gi???i thi???u </a></li>
				<li><a href="{{ route('huongdan') }}">h?????ng d???n</a></li>
				<li><a  href="{{ route('bieuphi') }}">b???ng gi??</a></li>
				<li><a  href="{{ route('tintuc') }}">tin t???c</a></li>
				<li><a  href="{{ route('lienhe') }}">li??n h???</a></li>
		<!-- 		<li><a  href="{{ route('tuvan') }}">t?? v???n</a></li> -->
			
				<a class="cc1"  href="{{ route('congcudathang') }}"><button  type="button" class="btn congcu ">C??ng C??? ?????t H??ng</button></a>
			</ul>
		</center>

	</div>
</div>
</div>



    @yield('main')
<br>
	<div  class="container">
		<div class="row tren">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<div class="cheo">

			</div>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 giua">
			<p>B???m v??o ????y <a href="" style="color: red">IORDER</a> ????? c??y app </p>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<div class="cheo2">

			</div>
		</div>
	</div>
	</div>
	</div>
<div class="container ket">
	<div class="row duoi">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
		<div  class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 bavuong">
			<div class="row wow animated bounceIn delay-0.5s">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vuong">
					<a href="#"><div class="triangle1" >
						<img class="img1"  src="{!!url('img/COCCOC.png')!!}" alt="">
					</div></a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vuong">
					<a href="#">
						<div class="triangle" >
						<img class="img2" src="{!!url('img/CHROME.png')!!}" alt="">
					</div>
					</a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vuong">
					<a href="#">
						<div class="triangle2" >
						<img class="img3" src="{!!url('img/FIREFOX.png')!!}" alt="">
					</div>
					</a>
				</div>
			</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
	</div>
</div>
</div>
</section>


<footer>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-double-up" aria-hidden="true"></i>
</button>
	<div style="background-color:#f5f5f5;padding-bottom: 20px" class="container-fluid">
		<div class="container">
		<div>
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 fd1 ">
				<img style="width: 100%;padding: 30px 0" src="{!!url('img/LOGO ch??nh th???c1.png')!!}" alt="">
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 fd1">
				<h3>h??? th???ng website</h3>
				<a href="#">trang ch???</a><br>
				<a href="#">Gi???i thi???u</a><br>
				<a href="#">H?????ng d???n</a><br>
				<a href="#">Bi???u ph??</a><br>
				<a href="#">Tin t???c</a><br>
				<a href="#">Tuy???n d???ng</a><br>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 fd1">
				<h3>gi??? m??? c???a</h3>
				<p>08:00 - 21:00</p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 fd1">
				<h3>b??? ph???n cskh</h3>
				<p><i class="fa fa-phone" aria-hidden="true"></i> 19002003</p>
				<p><i class="fa fa-facebook-official" aria-hidden="true"></i><a href="https://www.facebook.com/danatao.qc/"> IORDER</a></p>
				<p><i class="fa fa-instagram" aria-hidden="true"></i> Orer</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 fd1">
				<h3>????ng k?? nh???n tin</h3>
				<p>????ng k?? email ????? nh???n ???????c th??ng tin v??? c??c s??? ki???n v?? ch????ng tr??nh gi???m gi?? s???m nh???t.</p>
				<form class="example" action="/action_page.php" style="margin:auto;max-width:100%">
  <input class="nhap" type="text" placeholder="abc@gmail.com" name="search2">
  <button class="nutfooder" type="submit"><i class="fa fa-search"></i></button>
</form>
			</div>
		</div>
	</div>
	</div>
	</div>
	<div class="lastfooter">
		<p> ?? Copyright 2019 | IORDER.COM</p>
		<p>Design by <a style="color: #2ecc71" href="patict.vn"> PATICT</a></p>
	</div>
</footer>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="963587003806690"
  theme_color="#fa3c4c">
      </div>

<script type="text/javascript" src="{!!url('js/wow.min.js')!!}" ></script>
<script type="text/javascript">

              new WOW().init();

</script>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>


<script src="{!!url('owlcarousel/owl.carousel.min.js') !!}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">
	$(".btn10").on("click",function(){
		$('.menu12').toggleClass("show")
	});
</script>
<script>
function myFunction(x) {
  x.classList.toggle("change");
}
</script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script>
	$(document).ready(function() {
    var table = $('#example1').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=291397554876889&autoLogAppEvents=1"></script>
<script type="text/javascript" src="{!!url('js/script.js')!!}" ></script>

<script>
$(document).ready(function(){
  
    $.getJSON("https://free.currconv.com/api/v7/convert?q=CNY_VND&compact=ultra&apiKey=c8eb45e7ed633b7cf24f", function(result){
      
     
     	var x = new Intl.NumberFormat('vi-VN', { maximumSignificantDigits: 3 }).format(Math.round(result['CNY_VND']));
            
        $(".tiente").append(x);
    
    });
});
</script>
</body>
</html>
