@extends('backend.master')
@section('main')
<div class="container">
	<div class="row">
        <div class="col-12">
            <!-- Column -->
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Nạp tiền</h4>
                    
                    <div class="dt">
                
                		
                		<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-large btn-block btn-success" style="float: right;width: 156px">nap tiền</button>
                		<div id="id01" class="modal">
  
						  <form  action="{{route('admin.donhang.naptien')}}" enctype="multipart/form-data" class="modal-content animate" method="get">
						    <div class="imgcontainer">
						      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
						    
						    </div>

						    <div class="container">
						      	<div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên khách hàng</label>
                                                
                                                <select class="form-control custom-select"  name="khachhang">
                                                	@foreach($user as $user)
                                                    <option value="{{$user->id}}">{{$user->hoten}}</option>
													@endforeach
                                                    
                                                </select>
                                            </div>
			                            </div>  
			                            <div class="col-md-6">
			                            	<div class="form-group">
                                                <label class="control-label">nap tiền</label>
                                                <input type="text" class="form-control" id="" placeholder="" name="naptien">
                                            </div>
                                           
                                        </div>
			                        </div>                 
                                </div>
						       
						     
						     
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
                                    <th style="font-weight: bold;width: 10%;">Người Nạp</th>
                                    <th style="font-weight: bold;width: 13%;">Số tiền</th>  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th style="font-weight: bold;width: 10%;">Người Nạp</th>
                                    <th style="font-weight: bold;width: 13%;">Số tiền</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               @foreach($congtien as $congtien)
								<tr>
									<td>{{$congtien->hoten}}</td>
                                                
						
                                 <td><form action="
                            {!! url('admin/donhang/edittiennap',['id' =>$congtien->id,'sotien'=>$congtien->sotien]) !!}" enctype="multipart/form-data" method="get" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">    
                                <input type="text"  id="" placeholder="" data-id="{{$congtien->id}}" class='update_sotien'
                                 name="naptien" value="{{$congtien->sotien}}">
                                    </form></td>
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
    jQuery(document).ready(function($) {
        $(".update_sotien").change(function(event) {
            $sotien = $(this).val();
            $id = $(this).attr('data-id');
            
    
            $.ajax({
                url: 'edittiennap/'+$id+'/'+$sotien,
                type: 'GET'
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });
    });
</script>
@endsection