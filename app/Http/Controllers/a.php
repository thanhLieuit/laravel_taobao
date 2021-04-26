@if($chitietruser->xacnhandon == "đến tận nơi lấy")
											@if($chitietruser->thanhpho == "đà nẵng")
												Đà nẵng
											@else
												HCM
											@endif

										@else
										<form action="{{ route('canhan.donhang.xacnhangiao',['id' =>$chitietruser->id]) }}" enctype="multipart/form-data" method="post" >
				    						<input type="hidden" name="_token" value="{{csrf_token()}}">
				    						<input type="checkbox" id="vehicle1" name="vehicle1" value=" đến nơi lấy">
										    <label for="vehicle1"> đến nơi lấy</label><br>
										    <input type="checkbox" id="vehicle2" name="vehicle2" value="ship tận nhà">
										    <label for="vehicle2"> ship tận nhà</label><br>	
												
				             				<button type="submit" class="btn btn-primary" >xác nhận</button>

				             			</form>
				             			@endif