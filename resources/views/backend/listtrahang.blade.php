@extends('backend.master')
@section('main')
	<div class="container">
		 <center><h2 style="text-transform: uppercase;">Danh sách trả hàng</h2></center>
		<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Trả hàng (web)</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Trả hàng(tự tạo)</button>

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
                        <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">Hoàn Tiền</th>
 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">Hoàn Tiền</th>
                                
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($donhangtralai1 as $donhangtralai1)
                                <tr>
                                    <td><a  href="{!!url('admin/donhang/chitiettrahangg')!!}/{{$donhangtralai1->id}}" class="btn btn-large btn-block " style="margin-left: -52px;">{{$donhangtralai1->madonhang}}</a></td>
                                    <td>{{$donhangtralai1->updated_at}}</td>
                                    <td>{{$donhangtralai1->hoten}}</td>
                                    <td>{{$donhangtralai1->status}}</td>
                                    <td>@if($donhangtralai1->hoantien == 0)
                                        <i class="fa fa-circle-o-notch fa-spin" style="margin-left: 41px;"></i>
                                       
                                        @elseif($donhangtralai1->hoantien == $donhangtralai1->totalqty )
                                        <i class="fa fa-circle" aria-hidden="true" style="margin-left: 41px;"></i>
                                        @endif
                                    </td>
                                    
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
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">Hoàn Tiền</th>
 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">Tình trạng</th>
                                    <th style="font-weight: bold;width: 12%;">Hoàn Tiền</th>
                                
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($donhangtralai as $donhangtralai)
                                <tr>
                                    <td><a  href="{!!url('admin/donhang/chitiettrahang')!!}/{{$donhangtralai->id}}" class="btn btn-large btn-block " style="margin-left: -52px;">{{$donhangtralai->madonhang}}</a></td>
                                    <td>{{$donhangtralai->updated_at}}</td>
                                    <td>{{$donhangtralai->hoten}}</td>
                                    <td>{{$donhangtralai->status}}</td>
                                    <td>@if($donhangtralai->hoantien == 0)
                                        <i class="fa fa-circle-o-notch fa-spin" style="margin-left: 41px;"></i>
                                       
                                        @elseif($donhangtralai->hoantien == $donhangtralai->totalqty )
                                        <i class="fa fa-circle" aria-hidden="true" style="margin-left: 41px;"></i>
                                        @endif
                                    </td>
                                    
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
	</div>
@endsection