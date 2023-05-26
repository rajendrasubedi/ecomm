<div class="container">
			
			<div class="pt-md-5">
				<div class="row">
					@foreach($products as $product)
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<div class="image_container" style="height: 257px;">
								<img src="{{asset('images/shirt.jpg')}}" class="card-img-top"tyle="width: 100%; height: 100%;">
							</div>
							<div class="card-body">
								<h5 class="card-title">{{$product->title}}</h5>
								<p class="card-text">Rs. {{$product->amount}}</p>
								<p class="card-text">{{$product->description}}</p>
								<form method="post" action="{{route('checkout')}}">
									@csrf
									<input type="hidden" name="pid" value="{{$product->id}}">
									<input type="submit" name="submit" value="Buy Now">
								</form>
							</div>
						</div>
					</div>
					@endforeach