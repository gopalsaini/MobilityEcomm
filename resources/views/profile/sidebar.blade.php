

<div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-4 account__left--sidebar">
    <div class="dashboard-links">
        <ul class="account__menu">
            <li class="account__menu--list ">
                <a href="{{url('dashboard')}}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>

                    Dashboard
                </a>
            </li>
            <li class="account__menu--list ">
                <a href="{{ url('my-orders') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                    Order History
                </a>
            </li>
            <li class="account__menu--list ">
                <a href="{{ url('myprofile') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>

                    My Profile
                </a>
            </li>
            <li class="account__menu--list ">
                <a href="{{ url('my-wishlists') }}">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    Wishlist
                </a>
            </li>
            <li class="account__menu--list ">
                <a href="{{ url('my-address-book') }}">
                    <i class="fa fa-address-card" aria-hidden="true"></i>

                    Address Book
                </a>
            </li>
            <li class="account__menu--list ">
                <a href="{{url('logout')}}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                    Log Out
                </a>
            </li>
        </ul>
    </div>
</div>

