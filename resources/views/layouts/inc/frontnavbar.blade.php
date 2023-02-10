<style>

  .btn .bx {
    vertical-align: inherit;
    margin-top: -3px;
    font-size: 1.15rem;
  }

  .form-control {
    height: calc(2.5rem + 2px);
    padding: 0.5rem 1.5rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.3rem;
  }

  .btn1 {
    font-size: 1rem;
    padding: 6px 12px;;
    font-size: 1rem;
    color: white !important;
    line-height: 1.5;
    border-radius: 0.25rem;
  }

  .bx.icon-single {
    font-size: 1.5rem;
  }

  .form-inline .form-control {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }

  .form-inline .btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

/* Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) {
}

/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
  .form-inline .form-control {
    width: 210px;
  }
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) {
  .form-inline .form-control {
    width: 440px;
  }
}

/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
  .form-inline .form-control {
    width: 600px;
  }
}

.sub-menu.navbar-light .navbar-nav .active > .nav-link,
.sub-menu.navbar-light .navbar-nav .nav-link.active,
.sub-menu.navbar-light .navbar-nav .nav-link.show,
.sub-menu.navbar-light .navbar-nav .show > .nav-link {
  border-bottom: 3px solid #007bff;
  color: #007bff;
}

.navbar .navbar-toggler {
  border: none;
}

.navbar-light .navbar-toggler:focus {
  outline: none;
}

.navbar {
  padding: 1rem;
}

.main-menu {
  position: relative;
/*  z-index: 1;*/
}

.sub-menu {
  position: relative;
/*  z-index: 1;*/
padding: 0 1rem;
}

/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
  .sub-menu {
    padding: 0 1rem;
  }

  .sub-menu.navbar-expand-md .navbar-nav .nav-link {
    padding: 1rem 1.5rem;
  }
}

.navbar.bg-light {
  background: #fff !important;
}


section {
/*  padding: 6rem;*/
/*  background: #e4e4e4;*/
/*  margin-bottom: 30px;*/
position: relative;
/*z-index: 1;*/
}
.utility-nav {
/*  background: #e4e4e4;*/
padding: 0.5rem 1rem;
}

.utility-nav p {
  margin-bottom: 0;
}

.search-bar {
  position: relative;
/*  z-index: 1;*/
box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);
}

.search-bar .form-control {
  width: calc(100% - 45px);
}

.avatar {
  border-radius: 50%;
  width: 4.5rem;
  height: 4.5rem;
  margin-right: 8px;
}

.avatar.avatar-xs {
  width: 2.25rem;
  height: 2.25rem;
}

.user-dropdown .dropdown-menu {
  left: auto;
  right: 0;
}
.nav-main{
  box-shadow: 0px 2px 15px 0px rgb(0 0 0 / 10%);
}
</style>



<div class="nav-main">
  <nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
    <div class="container">

      <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
        <i class="bx bx-menu icon-single"></i>
      </button>

      <a class="navbar-brand" href="#">
        <h4 class="font-weight-bold text-success" style="font-size:40px;">Delight</h4>
      </a>

      <ul class="navbar-nav ml-auto d-block d-md-none">
        <li class="nav-item">
          <a class="btn btn-link" href="#"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-danger">3</span></a>
        </li>
      </ul>

      <div class="collapse navbar-collapse">
        <form action="{{url('/search')}}" method="GET" class="form-inline my-2 my-lg-0 mx-auto">
          <input class="form-control" name="search_product" type="search" placeholder="Search for products..." aria-label="Search">
          <button type="submit" class="btn btn-success btn1">SEARCH</button>
        </form>
  <!-- <form action="{{url('/search')}}" method="GET">
    <div class="hero__search__categories">
      All Categories
    </div>
    <input type="text" name="search_product" placeholder="What do yo u need?">
    <button type="submit" class="site-btn">SEARCH</button>
  </form> -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="btn btn-link" href="{{url('cart')}}"><i class="fa-sharp fa-solid fa-cart-shopping text-success fa-2x"></i> <span class="badge badge-danger">{{$cartitem->count()}}</span></a>
    </li>
    <li class="nav-item">
      <a class="btn btn-link" href="{{url('wishlist')}}"><i class="fa fa-heart text-success fa-2x"></i> <span class="badge badge-danger">{{$wishlist->count()}}</span></a>
    </li>

    <li class="nav-item dropdown ml-md-3">
      @guest
      @if (Route::has('login'))
      <a class="btn btn-primary mt-2" href="{{ route('login') }}"><i class="fa fa-user"></i> Log In</a>
      @endif
      @else
      <a class="btn btn-link text-success" href="{{url('My-Profile')}}" role="button" ><i class="fa-solid fa-user"></i> {{ Auth::user()->name}}</a>
      
      @endguest

    </li>
  </ul>
</div>
</div>
</nav>

<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mx-auto">

        <li class="nav-item active"><a  class="nav-link" href="{{url('/')}}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('shop')}}">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('blog')}}">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">Contact</a></li>
        {{-- <li class="nav-item"><a class="nav-link" href="{{url('my_order')}}">My Order</a></li> --}}
        @if(@Auth::user()->role_as==1)
        <li class="nav-item"><a class="nav-link" href="{{url('Dashboard')}}">Dashboard</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
</div>
