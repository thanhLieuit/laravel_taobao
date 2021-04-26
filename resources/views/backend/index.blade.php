@extends('backend.master')
@section('main')
 <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="selection">
    <select name="what-ever" id="selection">
      <option value="1">Tháng</option>
      <option value="2">Ngày</option>
      <option value="3">tuần</option>
    </select>
  </div>
  <div class="form-abc" id='form'>
    <div id="text-1" class="text text-1 open">
      <div class="card mb-4">
          <div class="card-header"><i class="fas fa-chart-area mr-1"></i>đơn hàng trong tháng</div>
          <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <div id="text-2" class="text text-2">
      <div class="card mb-4">
          <div class="card-header"><i class="fas fa-chart-area mr-1"></i>đơn hàng trong ngày</div>
          <div class="card-body"><canvas id="myAreaChart1" width="100%" height="30"></canvas></div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <div id="text-3" class="text text-3">
      <div class="card mb-4">
          <div class="card-header"><i class="fas fa-chart-area mr-1"></i>đơn hàng trong tuần</div>
          <div class="card-body"><canvas id="myAreaChart2" width="100%" height="30"></canvas></div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
  <script>
    jQuery(document).ready(function($) {
      $("#selection").on('change', function(event) {
        event.preventDefault();
        /* Act on the event */
        var selected = $(this).val();
        $(".text").removeClass('open');
        $(".text-"+selected).addClass('open');
      });
    });
  </script>
                 
               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Danh sách tất cả đơn hàng</h4>
                                <div class="table-responsive m-t-40">
                                    <?php 
                                        $dsdh = DB::table('donhangs')->orderBy('donhangs.id','desc')->limit(4)->get();
                                     ?>
                                     <table class="table" style="width: 100%">
                                       <thead>

                                        <tr class="tieude" >

                                            <th style="font-weight: bold;color: white">Mã đơn hàng </th>
                                            <th style="font-weight: bold;color: white">Tình trạng</th>
                                           
                                            <th style="font-weight: bold;color: white">Cọc tiền</th>
                                            <th></th>
                                            <th></th>


                                        </tr>
                                        </thead>
                                           @foreach($dsdh as $listdh)
                                        <tr>

                                 
                                            <td>{{$listdh->madonhang}}</td>
                                            <td></td>
                                            <td >{{$listdh->status}}</td>
                                          
                                            
                                    
                                           
                                        </tr>
                                        @endforeach
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        
                   
                <div class="row">
                    <div class="col-md-8">
                        <div class="tongquan">
                           <div class="col-md-12">
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="tdtq" style="border-right: 1px solid;">
                                           <h3>TỔNG QUAN TRONG NGÀY</h3>
                                           <div class="tq">
                                               <img src="{!!url('img/growth.svg')!!}" alt="" style="width: 80px;float: left">
                                               <div class="chutq" style="margin-left: 90px">
                                                   <p>Doanh thu</p>
                                                   <p>{{$doanhthu}} VNĐ</p>
                                               </div>
                                           </div>
                                           <br>
                                           <div class="tq">
                                               <img src="{!!url('img/order.svg')!!}" alt="" style="width: 80px;float: left">
                                               <div class="chutq" style="margin-left: 90px">
                                                   <p>Đơn hàng</p>
                                                   <p>{{$sodon}}</p>
                                               </div>
                                           </div>
                                           <br>
                                           <div class="tq">
                                               <img src="{!!url('img/team.svg')!!}" alt="" style="width: 80px;float: left">
                                               <div class="chutq" style="margin-left: 90px">
                                                   <p>Khách hàng mới</p>
                                                   <p>{{$member}}</p>
                                               </div>
                                           </div>
                                       </div>   
                                   </div>
                                   <div class="col-md-8">
                                        <div class="dhht">
                                            <h4>ĐƠN HÀNG HIỆN TẠI</h4>
                                        </div>
                                       <div class="row">
                                           <div class="col-md-6">
                                                <div class="khung">
                                                    <i class="fa fa-cart-plus" aria-hidden="true" style="font-size:36px"></i>
                                                    <p>{{$donhang}} <span> Đơn hàng</span></p>
                                                </div>
                                                <br>
                                                <div class="khung">
                                                    <i class="fa fa-retweet" style="font-size:36px"></i>
                                                    <p>{{$trahang}}<span> Bị trả Hàng</span></p>
                                                </div>  
                                           </div>
                                           <div class="col-md-6">
                                               <div class="khung">
                                                    <i style='font-size:36px' class='fas fa-shipping-fast'></i>
                                                    <p>{{$chogiao}} <span>Chờ Giao</span></p>
                                                </div>  
                                                <br>
                                                <div class="khung">
                                                    <i class="material-icons" style="font-size:36px">delete_sweep</i>
                                                    <p>{{$huy}} <span>Hủy</span></p>
                                                </div>  
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="nk">
                            <div class="nktd">
                                <h4>NHẬT KÝ HOẠT ĐỘNG</h4>
                            </div>
                             <?php 
                                    $nhatky = DB::table('nhatkys')->join('admins','admins.id','=','nhatkys.admin_id')->orderBy('nhatkys.thoigian','desc')->limit(4)->get();
                                 ?>
                            @foreach($nhatky as $nhatky)
                            <div class="ctnk">
                                <div class="hinhnk">
                                    <!-- <img src="{!! url('img/right-arrow.svg') !!}" alt="" style="width: 50px;float: left;"> -->
                                    <i class='fas fa-sign-out-alt' style='font-size:36px;float: left;'></i>
                                </div>
                                <div class="chunk">

                                    <p>{{$nhatky->name}} <span style="float: right;">{{$nhatky->thoigian}}</span></p>
                                    <p>{{$nhatky->thaotac}} </p>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
           
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/1.jpg') !!}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/2.jpg') !!}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/3.jpg') !!}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/4.jpg') !!}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/5.jpg') !!}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/6.jpg') !!}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/7.jpg') !!}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{!! url('backend/assets/images/users/8.jpg') !!}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

@stop