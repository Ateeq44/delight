@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
</li>
<li class="breadcrumb-item active">My Dashboard</li>
</ol>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-comments"></i>
      </div>
      <div class="mr-5">26 New Messages!</div>
  </div>
  <a class="card-footer text-white clearfix small z-1" href="#">
    <span class="float-left">View Details</span>
    <span class="float-right">
      <i class="fa fa-angle-right"></i>
  </span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
      </div>
      <div class="mr-5">11 New Tasks!</div>
  </div>
  <a class="card-footer text-white clearfix small z-1" href="#">
    <span class="float-left">View Details</span>
    <span class="float-right">
      <i class="fa fa-angle-right"></i>
  </span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-shopping-cart"></i>
      </div>
      <div class="mr-5">123 New Orders!</div>
  </div>
  <a class="card-footer text-white clearfix small z-1" href="#">
    <span class="float-left">View Details</span>
    <span class="float-right">
      <i class="fa fa-angle-right"></i>
  </span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-support"></i>
      </div>
      <div class="mr-5">13 New Tickets!</div>
  </div>
  <a class="card-footer text-white clearfix small z-1" href="#">
    <span class="float-left">View Details</span>
    <span class="float-right">
      <i class="fa fa-angle-right"></i>
  </span>
</a>
</div>
</div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-area-chart"></i> Area Chart Example
</div>
<div class="card-body">
    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
      <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
    </div>
    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
    </div>
</div>
<canvas id="myAreaChart" width="1581" height="474" class="chartjs-render-monitor" style="display: block; width: 1581px; height: 474px;"></canvas>
</div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> Recent Orders
</div>
<div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12 col-md-6"></div>
      </div>
      <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 254.703px;">Order Date</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 418.453px;">Tracking #</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 188.812px;">Total Price</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 97.1094px;">Status</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($orders as $item)
            <tr role="row" >
              <td class="sorting_1">{{date_format($item->created_at, 'd-m-Y')}}</td>
              <td>{{$item->tracking_no}}</td>
              <td>${{$item->total_price}}</td>
              <td>{{$item->status == '0' ? 'New Order' : ''}}</td>
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
<div class="row">
  <div class="col-lg-8">
    <!-- Example Bar Chart Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-bar-chart"></i> Bar Chart Example
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-sm-8 my-auto">
            <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
              <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
            </div>
            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
            </div>
        </div>
        <canvas id="myBarChart" width="677" height="338" class="chartjs-render-monitor" style="display: block; width: 677px; height: 338px;"></canvas>
    </div>
    <div class="col-sm-4 text-center my-auto">
        <div class="h4 mb-0 text-primary">$34,693</div>
        <div class="small text-muted">YTD Revenue</div>
        <hr>
        <div class="h4 mb-0 text-warning">$18,474</div>
        <div class="small text-muted">YTD Expenses</div>
        <hr>
        <div class="h4 mb-0 text-success">$16,219</div>
        <div class="small text-muted">YTD Margin</div>
    </div>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
    <!-- Example Pie Chart Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-pie-chart"></i> Pie Chart Example
    </div>
    <div class="card-body">
        <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
          <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
        </div>
        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
        </div>
    </div>
    <canvas id="myPieChart" width="479" height="479" class="chartjs-render-monitor" style="display: block; width: 479px; height: 479px;"></canvas>
</div>
</div>
</div>
</div>
{{-- <div class="cardBox">
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
            <a href="{{url('orders')}}" class="btn">View All</a>
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
                    <td>{{$item->status == '0' ? 'New Order' : ''}}</td>
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
</div> --}}
@endsection
