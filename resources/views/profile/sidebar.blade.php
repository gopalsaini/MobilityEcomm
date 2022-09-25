

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
            <!-- <li class="account__menu--list @if($active_tab=='4') active @endif"><a href="{{ url('my-wishlists') }}">
                <span>
                    <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.58174 0.0395918C6.1923 0.200766 4.65814 0.819116 3.53357 1.67116C2.96692 2.10051 1.94471 3.19691 1.54523 3.80382C0.72764 5.04599 0.192408 6.58348 0.0319071 8.15121C-0.0333236 8.78797 0.00642201 10.3031 0.106108 10.9819C0.607023 14.3927 2.37846 17.206 6.80067 21.6136C8.57856 23.3856 10.8684 25.4858 14.5872 28.755L16.0034 30L17.1375 29.001C20.1139 26.379 21.918 24.7538 23.326 23.4259C29.1873 17.8978 31.3429 14.7668 31.8934 10.9819C31.9933 10.2952 32.0333 8.78368 31.9684 8.15121C31.8073 6.58116 31.2765 5.05754 30.4539 3.80382C30.0561 3.1975 29.0354 2.10219 28.4666 1.67116C25.8711 -0.295336 22.3661 -0.547037 19.4849 1.02612C18.5275 1.54886 17.5496 2.37323 16.5481 3.50184L16.0001 4.1194L15.4366 3.48374C13.608 1.42114 11.8588 0.389862 9.66098 0.0787135C9.1907 0.0121128 8.00984 -0.0100874 7.58174 0.0395918ZM9.93318 2.17175C11.8822 2.62138 13.2669 3.69074 15.3561 6.35946C15.6976 6.79577 15.9874 7.1528 16.0001 7.1528C16.0127 7.1528 16.3026 6.79577 16.6441 6.35946C18.7654 3.6496 20.1731 2.5792 22.189 2.14304C22.7668 2.01803 24.2256 2.01704 24.7989 2.14126C27.4243 2.71018 29.4182 4.81403 29.989 7.61762C30.1098 8.21101 30.1527 9.37933 30.081 10.1225C29.728 13.7763 27.6814 16.7299 21.5893 22.3774C19.7143 24.1156 16.0862 27.3361 16.0029 27.3361C15.9166 27.3361 12.228 24.0638 10.3799 22.3477C5.64041 17.9468 3.43393 15.2376 2.47613 12.6429C1.78697 10.7759 1.68641 8.48821 2.21902 6.7934C2.71285 5.22212 3.79026 3.81279 5.14769 2.96262C5.80101 2.5534 6.62545 2.24181 7.42248 2.10288C8.01752 1.99918 9.34279 2.03554 9.93318 2.17175Z" fill="white"/>
                        </svg>
                                                    
                </span>
                Wishlist
            </a></li> -->
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

