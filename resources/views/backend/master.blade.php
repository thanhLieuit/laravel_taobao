<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon"  sizes="16x16" href="{!!url('img/logo.png')!!}">
    <title>Danatao | Admin</title>
    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="{!! url('backend/assets/plugins/bootstrap/css/bootstrap.min.css')!!}" >
    
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
     
   
    <link href="{!! url('backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')!!}" rel="stylesheet">
    <link href="" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{!! url('backend/assets/plugins/toast-master/css/jquery.toast.css')!!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! url('backend/css/style.css') !!}" rel="stylesheet">

    <link href="{!! url('backend/css/style1.css') !!}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{!! url('backend/css/colors/blue.css') !!}" id="theme" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    

   <!-- <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script> -->
 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
    </script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap&subset=vietnamese" rel="stylesheet">
</head>
<?php
        use App\nhatky;
        use Carbon\Carbon;
        use App\Admin;
      
        $check = DB::table('admins')->select('id')->where('id',Auth::user()->id)->first();
         $dt = Carbon::now();
        //dd($update1);
        if($check->id == auth::user()->id )
        {

            $update1 = DB::table('nhatkys')->where('admin_id',Auth::user()->id)->first();
            //dd($update1);
            if($update1){
                $update = nhatky::find($update1->id);
                $update->admin_id = auth::user()->id; 
                $update->thoigian = $dt;
                $update->thaotac = 'đăng nhập';       
                $update->save();
            }else{
                $new = New nhatky();
                $new->admin_id = auth::user()->id;
                $new->thoigian = $dt;
                $new->thaotac = 'đăng nhập';
                $new->save(); 
            }
        }
      

    ?>
<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{!!url('admin')!!}">
                        <!-- Logo icon -->
                        <b>
                            <!-- Dark Logo icon -->
                            <img style="width: 50px; height: 50px" src="{!! url('img/logo.png') !!}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{!! url('img/LOGO chính thức.png') !!}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img style="width: 100px" src="{!! url('img/LOGO chính thức.png') !!}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->
                         <img src="{!! url('img/LOGO chính thức.png') !!}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <?php 
                            $countdh = DB::table('donhangs')->where('status','chờ xác nhận')->count();
                            $htdh = DB::table('donhangs')->select('*')->where('status','chờ xác nhận')->get();

                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-globe" style="font-size:24px"></i>
                                <div class="notify">
                                @if($countdh > 0)
                                <span class="heartbit"></span> <span class="point"></span>
                                @else

                                @endif
                             </div>
                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                
                                <ul>
                                    <li>
                                        <div class="drop-title">Thông báo</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            @foreach($htdh as $htdh)
                                            <a href="{!! url('admin/donhang/list') !!}">
                                                <div class="btn btn-danger btn-circle" style="background: #f62d5100;border: 1px solid #f62d5100;"><img src="{{url('img/order.svg')}}" alt="" style="width: 30px;"></div>
                                                <div class="mail-contnet">
                                                    <h5>Đơn hàng: {{$htdh->madonhang}}</h5> <span class="mail-desc">{{$htdh->totalqty}} VNĐ</span> <span class="time">{{$htdh->created_at}}</span> </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php 
                              $countdhloi = DB::table('khieunais')->where('status','đơn hàng lỗi')->count();

                           $htdhloi = DB::table('khieunais')->select('khieunais.status','donhangs.madonhang')->join('donhangs','donhangs.id','=','khieunais.donhang_id')->where('khieunais.status','đơn hàng lỗi')->get();
    

                         ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-globe" style="font-size:24px"></i>
                                <div class="notify">
                                @if($countdhloi > 0)
                                <span class="heartbit"></span> <span class="point"></span>
                                @else

                                @endif
                             </div>
                            </a>
                            <div class="dropdown-menu mailbox animated bounceInDown">
                                
                                <ul>
                                    <li>
                                        <div class="drop-title">Thông báo</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            @foreach($htdhloi as $htdhloi)
                                            <a href="{!! url('admin/donhang/khieunai') !!}">
                                                <div class="btn btn-danger btn-circle" style="background: #f62d5100;border: 1px solid #f62d5100;"><img src="{{url('img/order.svg')}}" alt="" style="width: 30px;"></div>
                                                <div class="mail-contnet">
                                                    <h5>Đơn hàng: {{$htdhloi->madonhang}}</h5>
                                                    <p>{{$htdhloi->status}}</p>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                  
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{!! url('img/default-user-img.jpg') !!}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{!! url('backend/assets/images/users/1.jpg') !!}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->name}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li> <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-vn"></i></a>
                            <div class="dropdown-menu  dropdown-menu-right animated bounceInDown">  <a class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-vn"></i> Việt Nam</a> </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{!! url('img/default-user-img.jpg') !!}" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                        <a href="index.html#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Auth::user()->name}} 
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu animated flipInY">
                                <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <center><i class="fa fa-power-off"></i>
                                            Logout</center>
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                             
                        </div>
                        </div>
                    </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>

                        <a class="has-arrow " href="{!!url('admin')!!}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Trang chủ </span></a>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Tùy chọn </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{!!url('admin/Slider')!!}">Slider</a></li>
                                <li><a href="{!!url('admin/bieuphi/edit')!!}/1">Hình ảnh biểu phí</a></li>
                                <li><a href="{!!url('admin/listtygia')!!}">Tỷ giá</a></li>
                                <li><a href="{!!url('admin/listtuvan')!!}">Tư vấn khách hàng</a></li>
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class=" ti-book"></i><span class="hide-menu">Tin Tức </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{!!url('admin/tintuc')!!}">Danh sách tin tức</a></li>
                                <li><a href="{!!url('admin/tintuc/add')!!}">Thêm  tin tức</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class=" ti-user"></i><span class="hide-menu">
                            Tuyển dụng </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{!!url('admin/tuyendung')!!}">Danh sách tin tuyển dụng</a></li>
                                <li><a href="{!!url('admin/tuyendung/add')!!}">Thêm tin tuyển dụng</a></li>
                            </ul>
                        </li>
                        <li>

                            <a class="has-arrow " href="{!!url('admin/listlienhe')!!}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">
                            Phản hồi  </span></a>
                        </li>
            
                        <li class="nav-small-cap">PHÂN QUYỀN</li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">
                            Quản lý người dùng </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin/user/listuser') }}">Danh sách người dùng</a></li>
                                <li><a href="{{ route('admin/user/add') }}">Thêm người dùng </a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">
                            Quản lý quyền </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin/user/listrole') }}">Thêm Quyền </a></li>
                                <li><a href="{{ route('admin/user/addpremission') }}">Thêm vai trò </a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">ĐƠN HÀNG</li>
                         <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">
                            Quản lý đơn hàng </span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="{!! url('admin/donhang/list') !!}">Danh sách đơn hàng</a></li>
                                <li><a href="{!! url('admin/danhsachnap') !!}">Danh sách nạp tiền</a></li>
                                <li><a href="{!! url('admin/donhang/taodonhang') !!}">Tạo đơn hàng</a></li>
                                <li><a href="{!! url('admin/donhang/khieunai') !!}">khiếu nại</a></li>
                                <li><a href="{!! url('admin/donhang/listtrahang') !!}">Khách trả hàng</a></li>
                                <li><a href="{!! url('admin/donhang/listgiaohang') !!}">Quản lý giao hàng</a></li>
                                <li><a href="{!! url('admin/donhang/listnaptien') !!}">Quản lý cộng tiền</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">Khách hàng</li>
                         <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">
                            Quản lý Khách hàng </span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="{!! url('admin/khachhang/danhsachkhachhang') !!}">Danh sách khách hàng</a></li>
       
                               
                            </ul>
                        </li>
                        <li class="nav-small-cap">Nhà vận chuyển</li>
                         <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">
                            Quản lý vận chuyển </span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="{!! url('admin/nhavanchuyen') !!}">Nhà vận chuyển</a></li>
 
                            </ul>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="index.html" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="index.html" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->

                <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i>
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
           @yield('main')
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 PATICT
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     
    
    <script src="{!! url('backend/assets/plugins/jquery/jquery.min.js') !!}"></script>
 
    <script src="{!! url('backend/assets/plugins/bootstrap/js/tether.min.js') !!}"></script>
    <script src="{!! url('backend/assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{!! url('backend/js/jquery.slimscroll.js') !!}"></script>
    <!--Wave Effects -->
    <script src="{!! url('backend/js/waves.js') !!}"></script>
    <!--Menu sidebar -->
    <script src="{!! url('backend/js/sidebarmenu.js') !!}"></script>
    <!--stickey kit -->
    <script src="{!! url('backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') !!}"></script>
    <!--Custom JavaScript -->
    <script src="{!! url('backend/js/custom.min.js') !!}"></script>
    <!-- ============================================================== -->
    
     <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{!! url('backend/assets/plugins/demo/chart-area-demo.js') !!}"></script>
    <script src="{!! url('backend/assets/plugins/demo/chart-area-demo1.js') !!}"></script>
    <script src="{!! url('backend/assets/plugins/demo/chart-area-demo2.js') !!}"></script>
    <!-- ============================================================== -->
    <script src="{!! url('backend/assets/plugins/toast-master/js/jquery.toast.js') !!}"></script>
    <!-- Chart JS -->
  <!--   <script src="{!! url('backend/js/dashboard1.js') !!}"></script>
 -->    <script src="{!! url('backend/js/toastr.js') !!}"></script>
    <script>
        $.toast({
            heading: 'Welcome to Monster admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 3000,
            stack: 6
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{!! url('backend/assets/plugins/styleswitcher/jQuery.style.switcher.js') !!}"></script>
        <script>
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        });
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
    </script>
 <!--  <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
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
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#example24').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>

<script src="{!! url('ckeditor/ckeditor.js') !!}"></script>
<script> CKEDITOR.replace('editor1'); </script>

    

</body>

</html>
