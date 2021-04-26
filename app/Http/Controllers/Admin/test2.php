@if($chitietuser->note == "thanh toán đủ" || $chitietuser->note == "thanh toán sau" )
                    <div class="dropdown">
                        <button class="dropbtn">Giao hàng</button>
                        <div class="dropdown-content">
                            @if($soluongsp >=2)
                            <a href="#">shipper</a>
                            <a href="{{ route('admin.donhang.nhantaicuahang',['id' =>$chitietuser->id]) }}">nhận tại cửa hàng</a>
                            @else
                            <a href="{{ route('admin.donhang.nhantaicuahang',['id' =>$chitietuser->id]) }}">nhận tại cửa hàng</a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="dropbtn">Thanh toán</button>
                        <div class="dropdown-content" style="min-width: 180px;">
                            <a href="{{ route('admin.donhang.thanhtoantruoc',['id' =>$chitietuser->id]) }}">thanh toán trước</a>
                            <a href="{{ route('admin.donhang.thanhtoansau',['id' =>$chitietuser->id]) }}">Thanh toán sau</a>       
                        </div>
                    </div>
                @endif
                
                <br>
                <br>
                @if($chitietuser->status == "Nhận tại cửa hàng") 
                    <p>địa chỉ cửa hàng : </p>
                @endif