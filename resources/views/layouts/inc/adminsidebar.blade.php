<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon title">
                    <i class="fa-solid fa-cart-plus fa-1x"></i>
                </span>
                <span class="title" >Crazy Buy</span>
            </a>
        </li>

        <li>
            <a href="{{url('Dashboard')}}">
                <span class="icon title">
                    <i class="fa-solid fa-gauge fa-1x"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{url('/')}}">
                <span class="icon title">
                    <i class="fa-solid fa-house fa-1x"></i>
                </span>
                <span class="title">Home</span>
            </a>
        </li>

        <li>
            <a href="{{url('submit-category')}}">
                <span class="icon title">
                    <i class="fa-solid fa-circle-plus fa-1x"></i>
                </span>
                <span class="title">Add Category</span>
            </a>
        </li>

        <li>
            <a href="{{url('View-category')}}">
                <span class="icon title">
                    <i class="fa-solid fa-eye fa-1x"></i>
                </span>
                <span class="title">View Category</span>
            </a>
        </li>

        <li>
            <a href="{{url('submit-product')}}">
                <span class="icon title">
                    <i class="fa-solid fa-circle-plus fa-1x"></i>
                </span>
                <span class="title">Add Product</span>
            </a>
        </li>



        <li>
            <a href="{{url('view-product')}}">
                <span class="icon title">
                    <i class="fa-solid fa-eye fa-1x"></i>
                </span>
                <span class="title">View Product</span>
            </a>
        </li>

        <li>
            <a href="{{url('orders')}}">
                <span class="icon title">
                    <i class="fa-solid fa-sack-dollar fa-1x"></i>
                </span>
                <span class="title">Order</span>
            </a>
        </li>

        <li>
            <a href="{{url('users')}}">
                <span class="icon title">
                    <i class="fa-solid fa-user-group fa-1x"></i>
                </span>
                <span class="title">User</span>
            </a>
        </li>

        <li>
            <a href="{{url('add-blog')}}">
                <span class="icon title">
                    <i class="fa-solid fa-circle-plus fa-1x"></i>
                </span>
                <span class="title">Add Blog</span>
            </a>
        </li>

        <li>
            <a href="{{url('view-blog')}}">
                <span class="icon title">
                    <i class="fa-solid fa-eye fa-1x"></i>
                </span>
                <span class="title">View Blog</span>
            </a>
        </li>

        <li>
            <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="icon title">
                    <i class="fa-solid fa-right-from-bracket fa-1x"></i>
                </span>
                <span class="title">Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</div>
