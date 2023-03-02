<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="{{ url('/') }}">Delight</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ url('Dashboard') }}">
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
          <span class="nav-link-text">Category</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="{{url('submit-category')}}">Add Category</a>
          </li>
          <li>
            <a href="{{url('View-category')}}">View Category</a>
          </li>
        </ul>
      </li>

      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti1" data-parent="#exampleAccordion">
          <span class="nav-link-text">Sub Category</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti1">
          <li>
            <a href="{{url('submit-subcategory')}}">Add Subcategory</a>
          </li>
          <li>
            <a href="{{url('View-subcategory')}}">View Sub Category</a>
          </li>
        </ul>
      </li>

      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
          <span class="nav-link-text">Product</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti2">
          <li>
            <a href="{{url('submit-product')}}">Add Product</a>
          </li>
          <li>
            <a href="{{url('view-product')}}">View Product</a>
          </li>
        </ul>
      </li>

      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion">
          <span class="nav-link-text">Details</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti3">
          <li>
            <a href="{{url('detail')}}">Add Details</a>
          </li>
          <li>
            <a href="{{url('view-detail')}}">View Details</a>
          </li>
        </ul>
      </li>

      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion">
          <span class="nav-link-text">User</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti4">
          <li>
            <a href="{{url('users')}}">View User</a>
          </li>
        </ul>
      </li>

      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti5" data-parent="#exampleAccordion">
          <span class="nav-link-text">Order</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti5">
          <li>
            <a href="{{url('orders')}}">View Orders</a>
          </li>
        </ul>
      </li>

      <li class="nav-item pl-4" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti6" data-parent="#exampleAccordion">
          <span class="nav-link-text">Blogs</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti6">
          <li>
            <a href="{{url('add-blog')}}">Add Blog</a>
          </li>
          <li>
            <a href="{{url('view-blog')}}">View Blog</a>
          </li>
        </ul>
      </li>

    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-envelope"></i>
          <span class="d-lg-none">Messages <span class="badge badge-pill badge-primary">12 New</span>
        </span>
        <span class="indicator text-primary d-none d-lg-block">
          <i class="fa fa-fw fa-circle"></i>
        </span>
      </a>
      <div class="dropdown-menu" aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">New Messages:</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
          <strong>David Miller</strong>
          <span class="small float-right text-muted">11:21 AM</span>
          <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
          <strong>Jane Smith</strong>
          <span class="small float-right text-muted">11:21 AM</span>
          <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
          <strong>John Doe</strong>
          <span class="small float-right text-muted">11:21 AM</span>
          <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item small" href="#">View all messages</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-bell"></i>
        <span class="d-lg-none">Alerts <span class="badge badge-pill badge-warning">6 New</span>
      </span>
      <span class="indicator text-warning d-none d-lg-block">
        <i class="fa fa-fw fa-circle"></i>
      </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header">New Alerts:</h6>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">
        <span class="text-success">
          <strong>
            <i class="fa fa-long-arrow-up fa-fw"></i>Status Update </strong>
          </span>
          <span class="small float-right text-muted">11:21 AM</span>
          <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
          <span class="text-danger">
            <strong>
              <i class="fa fa-long-arrow-down fa-fw"></i>Status Update </strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-success">
              <strong>
                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update </strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" onclick="showModal()">
            <i class="fa fa-fw fa-sign-out"></i>Logout </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="modal fade show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>