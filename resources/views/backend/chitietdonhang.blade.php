@extends('backend.master')
@section('main')
<div class="container">
    <br>
          
    <center><h2 style="text-transform: uppercase;color:#EB4D4B ">Chi tiết đơn hàng của </h2></center>

    <table>
          @foreach($chitietuser as $chitietuser1)
        <tr>
            <th width="50%"> <b> <h4>Thông tin khách hàng</h4></b></th>
            <th width="50%"></th>
        </tr>

        <tr>
            <td>Họ Tên người đặt:</td>
            <td>{{$chitietuser1->hoten}}</td>
        </tr>
        <tr>
            <td>Ngày đặt:</td>
            <td>{{$chitietuser1->created_at}}</td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td>{{$chitietuser1->sodienthoai}}</td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td>{{$chitietuser1->diachi}}, {{$chitietuser1->thanhpho}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{$chitietuser1->email}}</td>
        </tr>
        <tr>
            <td>Ghi chú :</td>
            <td>{{$chitietuser1->note}}</td>
        </tr>
          @endforeach
    </table>
    <div style="height:30px "></div>
    <table class="table  table-hover">
        <thead>
        <tr>

            <th>Tên sản phẩm</th>
            <th>size</th>
            <th>color</th>
            <th>Số lượng</th>
          
        </tr>
        </thead>
        <tbody>
            @foreach($chitietdonhang as $chitietdonhang)
            <tr>
              
                <td>{{$chitietdonhang->name_product}}</td>
                <td>{{$chitietdonhang->size}}</td>
                <td>{{$chitietdonhang->color}}</td>
                <td>{{$chitietdonhang->quantity}}</td>
               
            </tr>
            @endforeach
        </tbody>
         
      
    </table>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                    <div class="donhang">
                        <p>Tiền hàng: {{$tienhang}} VNĐ</p>   
                        <p>Phí dịch vụ: {{$pdv}} VNĐ</p>
                        <p>Kiểm hàng: {{$kh}} VNĐ</p>
                        <p>Phí VC nội địa : {{$phivcnd}} VNĐ</p>
                        <p>Cân nặng thực tế: {{$kltt}} Kg </p>
                        <p>Cân quy đổi: {{$klqd}} Kg  <span style="margin-left: 33px;">Chiều dài: <span style="background-color: #737373;color: white;">{{$length}}</span> X Chiều rông: <span style="background-color: #737373;color: white;">{{$width}}</span> X Chiều cao: <span style="background-color: #737373;color: white;">{{$height}}</span></span></p>
                        <p>Phi vận chuyển TQ-VN: {{$cvc}} VNĐ</p>
                    <div class="tongdonhang">
                        <p>Tổng tiền hàng(Tạm tính): {{$sum}} VNĐ </p>
                        <p>Đã thanh toán: {{$coc}} VNĐ- Tiền hàng còn thiếu: {{$sum1}} VNĐ</p>
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
                <br>
<br>
                <h3 style="color: red">Thông tin đơn hàng</h3>
                <div class="ttdh">
                    <p>Mã đơn hàng: <span>{{$chitietuser1->madonhang}}</span></p>
                    <p>Ngày tạo đơn: <span>{{$chitietuser1->created_at}}</span></p>
                    <p>Người đặt hàng: <span>{{$chitietuser1->hoten}}</span></p>
                    <p>Kho hàng:
                       
                    </p>
                </div>
                @if($chitietuser1->status == "Giao hàng tận nhà")
                    <div class="selection">
                        <div class="form-group">
                            <label class="control-label">Chọn cách thức giao hàng</label>
                            <br>
                            <select name="what-ever" id="selection">
                            <option value="1">Tự gọi shipper</option>
                            <option value="2">Dịch Vụ tổng hợp</option>
                           
                        </select>
                        </div> 
                </div>
                <div class="form-abc" id='form'>

                        <div id="text-1" class="text text-1 open">
                            
                                <?php   $donhang = DB::table('donhangs')->select('donhangs.id')->join('admins','admins.id','=','donhangs.admin_id')->get();

                                        $donvan3 = DB::table('donvans')->select('donvans.id')
                                        ->join('donhangs','donhangs.id','=','donvans.donhang_id')
                                        ->join('admins','admins.id','=','donhangs.admin_id')
                                        ->where('admins.id',auth::user()->id)->first();
                                        ?>
                               
                                <?php if($donvan2 == null ){ ?>
                                     <div class="dcgh" style="background-color: white;padding: 10px;border-radius: 12px;border: 1px solid;">
                                        <h4 style="color: red">Địa chỉ giao hàng</h4>
                                        <p>{{$chitietuser1->sdt}}</p>
                                        <p>{{$chitietuser1->diachi}}, {{$chitietuser1->thanhpho}}</p>
                                    </div>
                                    <hr>
                                    <div class="ttgh" style="background-color: white;padding: 10px;border-radius: 12px;border: 1px solid;">
                                        <form action="{{route('admin.donhang.shipgiaohang',['id'=>$chitietuser1->id])}}" enctype="multipart/form-data" method="get" >
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="col-md-12">
                                            <h4 style="color: red">Thông tin giao hàng</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Đối tác</label>
                                                        <select class="form-control custom-select"  name="dt">
                                                            <option>--Chọn--</option>
                                                            @foreach($nhavanchuyen as $nhavanchuyen)
                                                            <option value="{{$nhavanchuyen->id}}">{{$nhavanchuyen->tennhavanchuyen}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Phí trả đối tác vận chuyển</label>
                                                        <input type="text" id="" class="form-control" placeholder=""  name="phi" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">người trả phí</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox2" type="checkbox" checked name="nt1">
                                                            <label for="checkbox2"> Shop trả </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox1" type="checkbox" checked name="nt2">
                                                            <label for="checkbox1"> Khách trả </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Yêu cầu</label>
                                                        <select class="form-control custom-select"  name="yc" style="font-size: 13px;">
                                                            <option>--Chọn--</option>
                                                           
                                                            <option value="Cho xem hàng, không cho thử">Cho xem hàng, không cho thử</option>
                                                            <option value="Cho xem hàng, cho thử">Cho xem hàng, cho thử</option>
                                                            <option value="Không cho xem hàng">Không cho xem hàng</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" >Lưu</button>
                                        
                                        </form>
                                    </div>
                                <?php }else{ ?>
                                    
                                    @foreach($donvan as $donvan1)
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nhà vận chuyển: <span style="font-weight: bold;">{{$donvan1->tennhavanchuyen}}</span></p>
                                                <p>Ngày đóng gói: <span style="font-weight: bold;">{{$donvan1->created_at}}</span></p>
                                                <p>Ghi chú: <span style="font-weight: bold;">{{$donvan1->yeucau}}</span></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Mã vận đơn: <span style="font-weight: bold;">{{$donvan1->madonvan}}</span></p>
                                                <p>Tổng tiền thu hộ COD: <span style="font-weight: bold;">{{$donvan1->phitravanchuyen}}</span></p>
                                            </div>
                                            <a href="{{route('admin.donhang.huyshipgiaohang',['id'=>$donvan1->id])}}"  class="btn btn-primary">hủy</a>
                                        </div>
                                    </div>
                                    @endforeach 
                                <?php } ?>
                                                     
                        </div>
                        <div id="text-2" class="text text-2">
                            Hello Text 2
                        </div>
                </div>
            
                @endif
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
    
 
</div>
@stop