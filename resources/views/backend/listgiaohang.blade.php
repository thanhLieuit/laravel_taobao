@extends('backend.master')
@section('main')
<div class="container">
	<div class="tab">
  	<button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Đang giao(tự đặt)</button>
  	<button class="talinks" onclick="openCity(event, 'Paris')">Chờ giao(tự đặt)</button>
	<button class="tablinks" onclick="openCity(event, 'London1')" id="defaultOpen">Đang giao(web)</button>
  	<button class="talinks" onclick="openCity(event, 'Paris1')">Chờ giao(web)</button>
</div>

<div id="London" class="tabcontent">
  	<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Đang giao</h4>
	            
	                <div class="table-responsive m-t-40">
	                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Mã đơn hàng</th>
	                                <th>Mã vận đơn</th>
	                                <th>Đơn vị giao</th>
	                                <th>Trạng thái</th>
	                                <th>Tiền COD</th>
	                                <th>Phí trả đối tác</th>
	                                <th>Ngày tạo</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>Mã đơn hàng</th>
	                                <th>Mã vận đơn</th>
	                                <th>Đơn vị giao</th>
	                                <th>Trạng thái</th>
	                                <th>Tiền COD</th>
	                                <th>Phí trả đối tác</th>
	                                <th>Ngày tạo</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	@foreach($donhang as $donhang)
	                            <tr>
	                                <td><a href="{{route('admin.donhang.chitietgiaohang',['id'=>$donhang->id])}}">{{$donhang->madonhang}}</a></td>
	                                <td>{{$donhang->madonvan}}</td>
	                                <td>{{$donhang->tennhavanchuyen}}</td>
	                                <td>{{$donhang->status}}</td>
	                                <td>{{$donhang->coc}}</td>
	                                <td>{{$donhang->phitravanchuyen}}</td>
	                                <td>{{$donhang->created_at}}</td>
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
	        <div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Chờ giao</h4>
	                <div class="table-responsive m-t-40">
	                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Tên khách hàng</th>
	                                <th>Mã đơn hàng</th>
	                                <th>Cân nặng</th>
	                                <th>ngày tạo đơn</th>
	                                
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>Tên khách hàng</th>
	                                <th>Mã đơn hàng</th>
	                                <th>Cân nặng</th>
	                                <th>ngày tạo đơn</th>
	                                
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	@foreach($donhang1 as $donhang1)
	                            <tr>
	                                <td>{{$donhang1->hoten}}</td>
	                                <td>{{$donhang1->madonhang}}</td>
	                                <td>{{$donhang1->weight_tt}}</td>
	                                <td>{{$donhang1->updated_at}}</td>   
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
<div id="London1" class="tabcontent">
  	<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Đang giao</h4>
	            
	                <div class="table-responsive m-t-40">
	                    <table id="example25" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Mã đơn hàng</th>
	                                <th>Mã vận đơn</th>
	                                <th>Đơn vị giao</th>
	                                <th>Trạng thái</th>
	                                <th>Tiền COD</th>
	                                <th>Phí trả đối tác</th>
	                                <th>Ngày tạo</th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>Mã đơn hàng</th>
	                                <th>Mã vận đơn</th>
	                                <th>Đơn vị giao</th>
	                                <th>Trạng thái</th>
	                                <th>Tiền COD</th>
	                                <th>Phí trả đối tác</th>
	                                <th>Ngày tạo</th>
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	@foreach($donhang2 as $donhang2)
	                            <tr>
	                                <td><a href="{{route('admin.donhang.chitietgiaohangg',['id'=>$donhang2->id])}}">{{$donhang2->madonhang}}</a></td>
	                                <td>{{$donhang2->madonvan}}</td>
	                                <td>{{$donhang2->tennhavanchuyen}}</td>
	                                <td>{{$donhang2->status}}</td>
	                                <td>{{$donhang2->coc}}</td>
	                                <td>{{$donhang2->phitravanchuyen}}</td>
	                                <td>{{$donhang2->created_at}}</td>
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
<div id="Paris1" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Chờ giao</h4>
	                <div class="table-responsive m-t-40">
	                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Tên khách hàng</th>
	                                <th>Mã đơn hàng</th>
	                                <th>Cân nặng</th>
	                                <th>ngày tạo đơn</th>
	                                
	                            </tr>
	                        </thead>
	                        <tfoot>
	                            <tr>
	                                <th>Tên khách hàng</th>
	                                <th>Mã đơn hàng</th>
	                                <th>Cân nặng</th>
	                                <th>ngày tạo đơn</th>
	                                
	                            </tr>
	                        </tfoot>
	                        <tbody>
	                        	@foreach($donhang4 as $donhang4)
	                            <tr>
	                                <td>{{$donhang4->hoten}}</td>
	                                <td>{{$donhang4->madonhang}}</td>
	                                <td>{{$donhang4->weight_tt}}</td>
	                                <td>{{$donhang4->updated_at}}</td>   
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