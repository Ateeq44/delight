<div class="container-fluid">
  <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
    <div class="col-lg-4">
      <a href="" class="text-decoration-none">
        <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
      </a>
    </div>
    <div class="col-lg-4 col-4 text-left">
      <form action="{{url('/search')}}" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" name="search_product" placeholder="Search for products">
          <div class="input-group-append">
            <span class="input-group-text bg-transparent text-primary">
              <i class="fa fa-search"></i>
            </span>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-4 col-4 text-right">
      <li class="nav-item dropdown ml-md-3 list-unstyled">
        @guest
        @if (Route::has('login'))
        <a class="btn btn-primary mt-2" href="{{ route('login') }}"><i class="fa fa-user"></i> My Profile</a>
        @endif
        @else
        <a class="btn btn-link" href="{{url('My-Profile')}}" role="button" ><i class="fa-solid fa-user"></i> {{ Auth::user()->name}}</a>

        @endguest

      </li>
    </div>
  </div>
</div>
<div class="container-fluid bg-dark mb-30">
  <div class="row px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
        <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
      </a>
      <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
        <div class="navbar-nav w-100">
          @foreach ($all_category as $item)
          <div class="nav-item dropdown dropright">
            <a class="nav-item nav-link" href="{{url('view-category/'.$item->slug)}}">{{$item->name}}</a>
          </div>
          @endforeach
        </div>
      </nav>
    </div>
    <div class="col-lg-9">
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
          <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
          <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ url('shop') }}" class="nav-item nav-link">Shop</a>
            <a href="{{url('blog')}}" class="nav-item nav-link">Blog</a>
            <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
            @if(@Auth::user()->role_as==1)
            <a href="{{ url('Dashboard') }}" class="nav-item nav-link">Dashboard</a>
            @endif
          </div>
          <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
            <a href="{{url('cart')}}" class="btn px-0 ">
              <i class="fas fa-shopping-cart text-primary"></i>
              <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{ $cartitem->count() }}</span>
            </a>
            <a href="{{url('wishlist')}}" class="btn px-0 ml-3">
              <i class="fas fa-heart text-primary"></i>
              <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{ $wishlist->count() }}</span>
            </a>
            
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>