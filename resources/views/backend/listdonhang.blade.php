@extends('backend.master')
@section('main')
<br>
    <center><h2 style="text-transform: uppercase;">Danh sách Đơn hàng</h2></center>
<div classs="container">

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Đơn Hàng Web</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Đơn Hàng Tự Tạo</button>

</div>

<div id="London" class="tabcontent">
    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
    <div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Đơn hàng</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">thanh toán</th>
                                    <th style="font-weight: bold;width: 12%;">thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">thanh toán</th>
                                    <th style="font-weight: bold;width: 12%;">thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                     <td><a  href="{!!url('admin/donhang/chitietdonhang')!!}/{{$user->id}}" class="btn btn-large btn-block " style="margin-left: -26px;">{{$user->madonhang}}</a></td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->hoten}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>@if($user->coc == 0)
                                        <i class="fa fa-circle-o-notch fa-spin" style="margin-left: 41px;"></i>
                                        @elseif($user->coc < $user->totalqty   )
                                        <i class="fa fa-adjust" aria-hidden="true" style="margin-left: 41px;"></i>

                                        @elseif($user->coc == $user->totalqty )
                                        <i class="fa fa-circle" aria-hidden="true" style="margin-left: 41px;"></i>
                                        @endif
                                    </td>
                                    @if($user->status == 'chờ xác nhận')
                                    <td>
                                        <a style="width: 163px;" href="{!!url('admin/donhang/duyetdon')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success">DUYỆT ĐƠN HÀNG</a>
                                      
                                        <a  href="{!!url('admin/donhang/huydonhang')!!}/{{$user->id}}" class="btn btn-warning">HỦY ĐƠN HÀNG</a>
                                    </td>
                                    <br>
                                     @elseif($user->status == 'Còn hàng')
                                    <td style="width: 163px;">Chờ khách hàng xác nhận
                                    </td>
                                    <br>
                                    @elseif($user->status == 'chờ mua hàng')
                                    <td ><a  href="{!!url('admin/donhang/chomuahang')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">Đã mua hàng</a>
                                    </td>
                                    <br>
                               
                                    @elseif($user->status == 'Đang vận chuyển')
                                    <td ><a  href="{!!url('admin/donhang/nhapthongtin')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">Hàng đã về</a>
                                    </td>
                                    <br>
                                     @elseif($user->status == 'Đã về kho')
                                     <td ><a  href="{!!url('admin/donhang/ketthucdon')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">kết thúc đơn</a>
                                    </td>
                                    <br>
                                    @elseif($user->status == 'chờ đơn hàng')
                                    <td style="">chuyển qua trang chờ mua hàng</td>
                                    <br>
                                    @elseif($user->status == 'Nhận tại cửa hàng')
                                     <td ><a  href="{!!url('admin/donhang/ketthucdon')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">kết thúc đơn</a>
                                    </td>
                                    <br>
                                    @elseif($user->status == 'Giao hàng tận nhà')
                                     <td ><a  href="{!!url('admin/donhang/ketthucdon')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">kết thúc đơn</a>
                                    </td>
                                    <br>
                                    @elseif($user->note == 'thanh toán sau'  )
                                    <td ><a  href="{!!url('admin/donhang/thanhtoantruoc')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">thanh toán</a>
                                    </td>
                                    <br>
                                    @elseif($user->status == 'kết thúc đơn'  )
                                    <td style="">
                                        <a  href="{!!url('admin/donhang/trahang')!!}/{{$user->id}}" class="btn btn-large btn-block btn-success" style="width: 200px;">trả hàng</a>
                                       
                                    </td>
                                    <br>
                                    @elseif($user->status == 'Khách trả hàng'  )
                                    <td style="">
                                        <p>Đang Xử Lý</p>
                                    </td>
                                    <br>
                                    @elseif($user->status == 'Đã xử lý'  )
                                    <td style="">
                                        <p>Hoàn tất</p>
                                    </td>
                                    <br> 
                                    @endif


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
</div>

<div id="Paris" class="tabcontent">
    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
    <div class="row">
        <div class="col-12">
            <!-- Column -->
          
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Đơn hàng</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">thanh toán</th>
                                    <th style="font-weight: bold;width: 12%;">thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">thanh toán</th>
                                    <th style="font-weight: bold;width: 12%;">thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($usertt as $usertt)
                                <tr>
                                     <td><a  href="{!!url('admin/donhang/chitietdonhangg')!!}/{{$usertt->id}}" class="btn btn-large btn-block " style="margin-left: -52px;">{{$usertt->madonhang}}</a></td>
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
                                    @if($usertt->status == 'chờ xác nhận')
                                    <td>
                                        <a style="width: 162px;" href="{!!url('admin/donhang/duyetdon')!!}/{{$usertt->id}}" class="btn btn-large btn-block btn-success">DUYỆT ĐƠN HÀNG</a>
                                      
                                        <a  href="{!!url('admin/donhang/huydonhang')!!}/{{$usertt->id}}" class="btn btn-warning" style="width: 163px;">HỦY ĐƠN HÀNG</a>
                                    </td>
                                    <br>
                                    @elseif($usertt->status == 'Còn hàng')
                                    <td style=""><a  href="{!!route('admin.donhang.coctien',['id'=>$usertt->id])!!}" class="btn btn-large btn-block btn-success" style="width: 163px;">xác nhận thanh toán</a>
                                    </td>
                                    <br>

                                    @elseif($usertt->status == 'chờ mua hàng')
                                    <td style=""><a  href="{!!url('admin/donhang/chomuahang')!!}/{{$usertt->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">Đã mua hàng</a>
                                    </td>
                                    <br>
                                   
                                    <br>
                                    @elseif($usertt->status == 'Đang vận chuyển')
                                    <td style=""><a  href="{!!url('admin/donhang/nhapthongtin')!!}/{{$usertt->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">Hàng đã về</a>
                                    </td>
                                    <br>
                                    @elseif($usertt->status == 'Đã về kho')
                                    <td style=""><a  href="{!!url('admin/donhang/ketthucdon')!!}/{{$usertt->id}}" class="btn btn-large btn-block btn-success" style="width: 163px;">kết thúc đơn</a></td>
                                    <br>
                                    @elseif($usertt->status == 'chờ đơn hàng')
                                    <td style="">chuyển qua trang chờ mua hàng</td>
                                    <br>
                                    @elseif($usertt->status == 'kết thúc đơn'  )
                                    <td style="">
                                        <a  href="{!!url('admin/donhang/trahang')!!}/{{$usertt->id}}" class="btn btn-large btn-block btn-success" style="width: 200px;">trả hàng</a>
                                       
                                    </td>
                                    <br>
                                    @elseif($usertt->status == 'Khách trả hàng'  )
                                    <td style="">
                                        <p>Đang Xử Lý</p>
                                    </td>
                                    <br>
                                    @elseif($usertt->status == 'Đã xử lý'  )
                                    <td style="">
                                        <p>Hoàn tất</p>
                                    </td>
                                    <br> 
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
</div>



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
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
   
</div>
@stop