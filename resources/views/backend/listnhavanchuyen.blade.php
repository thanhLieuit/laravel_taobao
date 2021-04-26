@extends('backend.master')
@section('main')
<div class="controler">
	
    <div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Đối tác tích hợp</button>
	  <button class="tablinks" onclick="openCity(event, 'Paris')">Đối tác giao hàng tự liên hệ</button>

	</div>

	<div id="London" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  
	</div>

	<div id="Paris" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
		
	  	<div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-block">
                	<div class="dt">
                		<h4 class="card-title" style="float: left;">đối tác</h4>
                		
                		<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-large btn-block btn-success" style="float: right;width: 156px">Tạo đối tác</button>
                		<div id="id01" class="modal">
  
						  <form  action="{{route('admin.nhavanchuyen.themmoidoitac')}}" enctype="multipart/form-data" class="modal-content animate" method="get">
						    <div class="imgcontainer">
						      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
						    
						    </div>

						    <div class="container">
						      	<div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên đối tác</label>
                                                <input type="text" class="form-control" id="" placeholder="" name="tendt">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Loại đối tác</label>
                                                <select class="form-control custom-select"  name="dt">
                                                    <option value="Shipper của cửa hàng">Shipper của cửa hàng</option>
                                                    <option value="Shipper cá nhân">Shipper cá nhân</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" id="" placeholder="" name="emaildt">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số điện thoại</label>
                                                <input type="text" class="form-control" id="" placeholder="" name="phonedt">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Địa Chỉ</label>
                                                <input type="text" class="form-control" id="" placeholder="" name="dcdt">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhân viên phụ trách</label>
                                                @foreach($admin as $admin)
                                                <input type="text" class="form-control" id="" placeholder="" name="nv" value="{{$admin->name}}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
						       
						     
						     
						    </div>

						    <div class="container" style="background-color:#f1f1f1">
						      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="float: left;margin-right: 15px;">Cancel</button>
						       
						    </div>
                             <button type="submit" class="btn btn-large btn-block btn-success" style="width: 91px;margin-top: 8px;">lưu</button>
						  </form>
						</div>

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
                    
                    
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">loaidoitac</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="font-weight: bold;width: 10%;">Mã đơn hàng</th>
                                    <th style="font-weight: bold;width: 13%;">Ngày tạo đơn</th>  
                                    <th style="font-weight: bold;width: 17%;">Tên khách hàng</th>
                                    <th style="font-weight: bold;width: 12%;">loaidoitac</th>  
                                </tr>
                            </tfoot>
                            <tbody>
                                 @foreach($nhavanchuyen as $nhavanchuyen)
                                <tr>
                                    <td><a href="">{{$nhavanchuyen->manhavanchuyen}}</a></td>
                                    <td>{{$nhavanchuyen->created_at}}</td>
                                    <td>{{$nhavanchuyen->tennhavanchuyen}}</td>
                                    <td>{{$nhavanchuyen->loaidoitac}}</td>
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