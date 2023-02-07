@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
<div class="cardBox">
    <div class="card">
        <div>
            @foreach ($product as $item)
            @php
            @$stock += $item->qty;
            @endphp
            @endforeach

            @foreach ($orders as $item)
            @php
            @$earning += $item->total_price;
            @endphp
            @endforeach
            <div class="numbers">{{@$stock}}</div>
            <div class="cardName mt-3 mt-3">Total Stock</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline" role="img" class="md hydrated" aria-label="eye outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <a href="{{url('view-product')}}">
            <div>
                <div class="numbers">{{$product->count()}}</div>
                <div class="cardName mt-3">Product</div>
            </div>
        </a>
        <div class="iconBx">
            <ion-icon name="cart-outline" role="img" class="md hydrated" aria-label="cart outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">{{$orders->count()}}</div>
            <div class="cardName mt-3">Total Order</div>
        </div>

        <div class="iconBx">
            <ion-icon name="chatbubbles-outline" role="img" class="md hydrated" aria-label="chatbubbles outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">${{@$earning}}</div>
            <div class="cardName mt-3">Total Earning</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash outline"></ion-icon>
        </div>
    </div>
</div>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Orders</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Tracking No.</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td>{{date_format($item->created_at, 'd-m-Y')}}</td>
                    <td>{{$item->tracking_no}}</td>
                    <td>${{$item->total_price}}</td>
                    <td>{{$item->status == '0' ? 'Pending' : 'delivered'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- ================= New Customers ================ -->
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Recent Customers</h2>
        </div>

        <table>
            <tbody><tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>
        </tbody></table>
    </div>
</div>
@endsection
