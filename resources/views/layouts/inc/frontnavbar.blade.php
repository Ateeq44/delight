<style>
  .dropbtn {
    /* background-color: #3498DB; */
    color: rgb(1, 0, 0);

    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropbtn:hover, .dropbtn:focus {
    /* background-color: #2980B9; */
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
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
  z-index: 3;
}

.sub-menu {
  position: relative;
  z-index: 2;
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
  box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);
}

.user-dropdown .nav-link {
  padding: 0.15rem 0;
}

#sidebar {
  background: #fff;
  height: 100%;
  left: -100%;
  top: 0;
  bottom: 0;
  overflow: auto;
  position: fixed;
  transition: 0.4s ease-in-out;
  width: 84%;
  z-index: 5001;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
  padding: 1.25rem 1rem 1rem;
}

#sidebar.active {
  left: 0;
}

#sidebar .sidebar-header {
  background: #fff;
  border-bottom: 1px solid #e4e4e4;
  padding-bottom: 1.5rem;
}

#sidebar ul.components {
  padding: 20px 0;
  border-bottom: 1px solid #e4e4e4;
  margin-bottom: 40px;
}

#sidebar ul p {
  color: #fff;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px 16px;
  font-size: 1.1em;
  display: block;
  color: #000;
}

#sidebar ul li a:hover {
  color: #7386d5;
  background: #fff;
}

#sidebar ul li.active > a,
#sidebar a[aria-expanded="true"] {
  color: #007bff;
  background: #e6f2ff;
  border-radius: 6px;
}

a[data-toggle="collapse"] {
  position: relative;
}

#sidebar .links .dropdown-toggle::after {
  display: block;
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
}

section {
/*  padding: 6rem;*/
/*  background: #e4e4e4;*/
/*  margin-bottom: 30px;*/
position: relative;
z-index: 1;
}

.overlay {
  background: rgba(0, 0, 0, 0.7);
  height: 100vh;
  left: 0;
  position: fixed;
  top: 0;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  z-index: -1;
  width: 100%;
  opacity: 0;
}

.overlay.visible {
  opacity: 1;
  z-index: 5000;
}

/* .mobiHeader .menuActive~.overlay {
    opacity: 1;
    width: 100%;
} */

ul.social-icons {
  list-style-type: none;
  padding-left: 0;
  margin-bottom: 0;
}

ul.social-icons li {
  display: inline-block;
  margin-right: 0px;
  margin-bottom: 0;
}

#sidebar ul.social-icons li a {
  font-size: 24px;
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
  z-index: 2;
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
</style>



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
      <a class="btn btn-link" href="{{url('cart')}}"><i class="fa fa-shopping-bag text-success fa-2x"></i> <span class="badge badge-danger">{{$cartitem->count()}}</span></a>
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


<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

    // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>
