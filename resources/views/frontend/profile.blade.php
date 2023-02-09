<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');

/* Resetting */
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}



.sidebar {
	padding: 15px 0px 15px 0px;
	border-radius: 10px;
}

.sidebar .h4 {
	font-weight: 500;
	padding-left: 15px;
}

.sidebar ul {
	list-style: none;
	margin: 0;
	padding-left: 0rem;
}

.sidebar ul li {
	padding: 10px 0;
	display: block;
	padding-left: 1rem;
	padding-right: 1rem;
	border-left: 5px solid transparent;
}

/*.sidebar ul li.active {
	border-left: 5px solid #ff5252;
	background-color: #28a745!important;
}*/

.sidebar ul li a {
	display: block;
}

.sidebar ul li a .fas,
.sidebar ul li a .far {
	color: #ddd;
	font-size:25px !important;
}

.sidebar ul li a .link {
	color: #fff;
	font-weight: 500;
	margin-left:15px;
}

.sidebar ul li a .link-desc {
	font-size: 0.8rem;
	color: #ddd;
	margin-left:15px;

}

#main-content {
	padding: 30px;
	border-radius: 15px;
}

#main-content .h5,
#main-content .text-uppercase {
	font-weight: 600;
	margin-bottom: 0;
}

#main-content .h5+div {
	font-size: 0.9rem;
}

#main-content .box {
	padding: 10px;
	border-radius: 6px;
	width: 170px;
	height: 90px;
}

#main-content .box img {
	width: 40px;
	height: 40px;
	object-fit: contain;
}

#main-content .box .tag {
	font-size: 0.9rem;
	color: #000;
	font-weight: 500;
}

#main-content .box .number {
	font-size: 1.5rem;
	font-weight: 600;
}

.order {
	padding: 10px 30px;
	min-height: 150px;
}

.order .order-summary {
	height: 100%;
}

.order .blue-label {
	background-color: #aeaeeb;
	color: #0046dd;
	font-size: 0.9rem;
	padding: 0px 3px;
}

.order .green-label {
	background-color: #a8e9d0;
	color: #008357;
	font-size: 0.9rem;
	padding: 0px 3px;
}

.order .fs-8 {
	font-size: 0.85rem;
}

.order .rating img {
	width: 20px;
	height: 20px;
	object-fit: contain;
}

.order .rating .fas,
.order .rating .far {
	font-size: 0.9rem;
}

.order .rating .fas {
	color: #daa520;
}

.order .status {
	font-weight: 600;
}

.order .btn.btn-primary {
	background-color: #fff;
	color: #28a745!important;
	border: 1px solid #28a745!important;
}

.order .btn.btn-primary:hover {
	background-color: #28a745!important;
	color: white !important;
}

.order .progressbar-track {
	margin-top: 20px;
	margin-bottom: 20px;
	position: relative;
}

.order .progressbar-track .progressbar {
	list-style: none;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding-left: 0rem;
}

.order .progressbar-track .progressbar li {
	font-size: 1.5rem;
	border: 1px solid #333;
	padding: 5px 10px;
	border-radius: 50%;
	background-color: #dddddd;
	z-index: 100;
	position: relative;
}

.order .progressbar-track .progressbar li.green {
	border: 1px solid #007965;
	background-color: #d5e6e2;
}

.order .progressbar-track .progressbar li::after {
	position: absolute;
	font-size: 0.9rem;
	top: 50px;
	left: 0px;
}

#tracker {
	position: absolute;
	border-top: 1px solid #bbb;
	width: 100%;
	top: 25px;
}

#step-1::after {
	content: 'Placed';
}

#step-2::after {
	content: 'Accepted';
	left: -10px;
}

#step-3::after {
	content: 'Packed';
}

#step-4::after {
	content: 'Shipped';
}

#step-5::after {
	content: 'Delivered';
	left: -10px;
}



/* Backgrounds */
.bg-purple {
	background-color: #28a745!important;
}

.bg-light {
	background-color: #f0ecec !important;
}

.green {
	color: #007965 !important;
}

/* Media Queries */
@media(max-width: 1199.5px) {
	nav ul li {
		padding: 0 10px;
	}
}

@media(max-width: 500px) {
	.order .progressbar-track .progressbar li {
		font-size: 1rem;
	}

	.order .progressbar-track .progressbar li::after {
		font-size: 0.8rem;
		top: 35px;
	}

	#tracker {
		top: 20px;
	}
}

@media(max-width: 440px) {
	#main-content {
		padding: 20px;
	}

	.order {
		padding: 20px;
	}

	#step-4::after {
		left: -5px;
	}
}

@media(max-width: 395px) {
	.order .progressbar-track .progressbar li {
		font-size: 0.8rem;
	}

	.order .progressbar-track .progressbar li::after {
		font-size: 0.7rem;
		top: 35px;
	}

	#tracker {
		top: 15px;
	}

	.order .btn.btn-primary {
		font-size: 0.85rem;
	}
}

@media(max-width: 355px) {
	#main-content {
		padding: 15px;
	}

	.order {
		padding: 10px;
	}
}
</style>
@extends('layouts.front')

@section('title')
My Profile
@endsection

@section('content')
<div class="container my-4 ">
	<div class="row">
		<div class="col-lg-3 my-lg-0 my-md-1 bg-purple">

			<div class="sidebar">
				<div class="h4 text-white">Account</div>
				<ul>
					<li class="active">
						<a href="#" class="text-decoration-none d-flex align-items-start">
							<div class="fas fa-box pt-2 me-3"></div>
							<div class="d-flex flex-column">
								<div class="link">My Account</div>
								<div class="link-desc">View & Manage orders and returns</div>
							</div>
						</a>
					</li>
					<li>
						<a href="#" class="text-decoration-none d-flex align-items-start">
							<div class="fas fa-box-open pt-2 me-3"></div>
							<div class="d-flex flex-column">
								<div class="link">My Orders</div>
								<div class="link-desc">View & Manage orders and returns</div>
							</div>
						</a>
					</li>
					<li>
						<a href="#" class="text-decoration-none d-flex align-items-start">
							<div class="far fa-address-book pt-2 me-3"></div>
							<div class="d-flex flex-column">
								<div class="link">Address Book</div>
								<div class="link-desc">View & Manage Addresses</div>
							</div>
						</a>
					</li>
					<li>
						<a href="#" class="text-decoration-none d-flex align-items-start">
							<div class="far fa-user pt-2 me-3"></div>
							<div class="d-flex flex-column">
								<div class="link">My Profile</div>
								<div class="link-desc">Change your profile details & password</div>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="text-decoration-none d-flex align-items-start">
							<div class="fa-solid fa-right-from-bracket fas pt-2 me-3"></div>
							<div class="d-flex flex-column">
								<div class="link">LogOut</div>
								<div class="link-desc">Click to disconnect</div>
							</div>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9 my-lg-0 my-1">
			<div id="main-content" class="bg-white border">
				<div class="d-flex flex-column">
					<div class="h5">Hello {{ Auth::user()->name}},</div>
				</div>
				<div class="d-flex my-4 flex-wrap">
					<div class="box me-4 my-1 bg-light">
						<img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
						alt="">
						<div class="d-flex align-items-center mt-2">
							<div class="tag">Orders placed</div>
							<div class="ms-auto number ml-2">{{$order->count()}}</div>
						</div>
					</div>
					<div class="box me-4 my-1 bg-light">
						<img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
						alt="">
						<div class="d-flex align-items-center mt-2">
							<div class="tag">Items in Cart</div>
							<div class="ms-auto number ml-2">{{$cartitem->count()}}</div>
						</div>
					</div>
					<div class="box me-4 my-1 bg-light">
						<img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png"
						alt="">
						<div class="d-flex align-items-center mt-2">
							<div class="tag">Wishlist</div>
							<div class="ms-auto number ml-2">{{$wishlist->count()}}</div>
						</div>
					</div>
				</div>
				<div class="text-uppercase">My recent orders</div>
				@foreach ($order as $item)

				<div class="order my-3 bg-light">
					<div class="row">
						<div class="col-lg-4">
							<div class="d-flex flex-column justify-content-between order-summary">
								<div class="d-flex align-items-center">
									<div class="text-uppercase">Order {{$item->tracking_no}}</div>
									@if($item->payment_id == NULL)
									<div class="blue-label ml-4 text-uppercase">COD</div>
									@else
									<div class="blue-label ml-4 text-uppercase">paid</div>
									@endif
								</div>
								<div class="text-uppercase" style="font-size:20px;">Payment: ${{$item->total_price}}</div>
								<div class="fs-8">{{date_format($item->created_at, 'd-m-Y')}}</div>
								
							</div>
						</div>
						<div class="col-lg-8">
							<div class="d-sm-flex align-items-sm-start justify-content-sm-between">
								<div class="status">
									<label style="font-size:15px">Payment Status</label>
									@if($item->payment_id == null)
									<span style="font-weight: 400 !important; font-size:15px !important;"  class="badge badge-danger">Pending</span>
									@else
									<span  style="font-weight: 400 !important; font-size:15px !important;" class="badge badge-success">Completed</span>
									@endif
								</div>
								<a href="{{url('view_order/'.$item->id)}}" class="btn btn-primary text-uppercase">order info</a>
							</div>
							<div class="progressbar-track">
								<ul class="progressbar">
									<li id="step-1" class="text-muted green">
										<span class="fas fa-gift"></span>
									</li>
									<li id="step-2" class="text-muted green">
										<span class="fas fa-check"></span>
									</li>
									<li id="step-3" class="text-muted green">
										<span class="fas fa-box"></span>
									</li>
									<li id="step-4" class="text-muted green">
										<span class="fas fa-truck"></span>
									</li>
									<li id="step-5" class="text-muted green">
										<span class="fas fa-box-open"></span>
									</li>
								</ul>
								<div id="tracker"></div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				@endforeach
				
			</div>
		</div>
	</div>

</div>

@include('layouts.inc.footer')
@endsection

@section('script')



@endsection
