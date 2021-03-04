<header class="main-nav">
    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn"><a href="i{{url('/home')}}"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-title">
                        <div>
                            <h6>Administrator</h6>
                            <p >Dashboards Section</p>
                        </div>
                    </li>
                    <li ><a class="nav-link menu-title" href="{{url('/home')}}"><i data-feather="home"></i><span >Dashboard</span></a>

                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span >Add Rates</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{url('add/rate')}}">Add Rate</a></li>
                            <li><a href="{{url('/list/rate')}}">List Rate</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="layout"></i><span >Payout Request</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{url('payout/request')}}">Payout Request</a></li>
                            <li><a href="{{url('/list/all-request')}}">All Request</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-title">
                        <div>
                            <h6 >User</h6>
                            <p >User Dashboard</p>
                        </div>
                    </li>
                    <li ><a class="nav-link menu-title" href="{{url('/home')}}"><i data-feather="home"></i><span >Dashboard</span></a>

                    <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"></i><span>Exchange Currency</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{url('/currency/exchange')}}">Currency Exchange</a></li>
                        </ul>
                    </li>

                    <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="shopping-bag"></i><span>Transactions</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{url('/transaction/history')}}">Transaction History</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
