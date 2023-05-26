<div class="col-md-6">
							<h3>Pay With </h3>
							<ul class="list-group">
								<li class="list-group-item">
									<form action="https://uat.esewa.com.np/epay/main" method="POST">
										<input value="{{$product->amount}}" name="tAmt" type="hidden">
										<input value="{{$product->amount}}" name="amt" type="hidden">
										<input value="0" name="txAmt" type="hidden">
										<input value="0" name="psc" type="hidden">
										<input value="0" name="pdc" type="hidden">
										<input value="epay_payment" name="scd" type="hidden">
										<input value="{{$order->invoice_no}}" name="pid" type="hidden">
										<input value="{{route('esewa.success')}}" type="hidden" name="su">
										<input value="{{route('esewa.fail')}}" type="hidden" name="fu">
										<input type="image" style="width: 100px;" src="{{asset('images/esewalogo.png')}}" alt="Pay Using Esewa">
									</form>
								</li>
								</ul>
							</div>
						</div>