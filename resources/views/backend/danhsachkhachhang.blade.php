@extends('backend.master')
@section('main')

<div class="container">
	<br>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<div class="title"><h2>Khách hàng</h2> </div>

			</div>
			<div class="col-md-6">
				<a href="{!!url('admin/khachhang/themkhachhang')!!}" type="button" class="btn btn-success">Thêm khách hàng</a>
				<a href="{!!url('admin/khachhang/danhsachnhomkhachhang')!!}" type="button" class="btn btn-success">Nhóm khách hàng</a>
			</div>
		</div>
	</div>

	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Tất cả khách hàng</button>

	</div>

	<div id="London" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	 	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
	                <th>Tên</th>
	                <th>Nhóm khách hàng</th> 
	                <th>số điện thoại</th>         
	                <th>thao tác</th>
	               
	            </tr>
            </thead>
            <tfoot>
                <tr>
	                <th>Tên</th>
	                <th>Nhóm khách hàng</th> 
	                <th>số điện thoại</th>         
	                <th>thao tác</th>
	              
	            </tr>
            </tfoot>
            <tbody>
                 @foreach($thongtin as $thongtin)
	           
	            	<tr>
	            		
		                <td>{{$thongtin->hoten}}</td>
		                <td>{{$thongtin->tennhom}}</td>
		                <td>{{$thongtin->sdt}}</td>
						<td><a href="{{ route('admin/khachhang/thongtinchitiet',['id' =>$thongtin->id])}}">Chi tiết</a></td>
	            	</tr>
	          	
	           	@endforeach
            </tbody>
        </table>
	</div>

<div id="Paris" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
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