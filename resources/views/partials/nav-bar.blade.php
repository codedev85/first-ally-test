<div class="page-main-header">
    <div class="main-header-right row m-0">
        <form class="form-inline search-full" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
        </div>
        <div class="left-menu-header col horizontal-wrapper pl-0">
            <ul class="horizontal-menu">
                <li class="mega-menu"><a class="nav-link" href="#"><i data-feather="layers"></i><span>Dashboard</span></a>
                    <div class="mega-menu-container menu-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col mega-box">
                                    <div class="mobile-title d-none">
                                        <h5>Mega menu</h5><i data-feather="x"></i>
                                    </div>
                                    <div class="link-section icon">
                                        <div>
                                            <h6>Error Page</h6>
                                        </div>
                                        <ul>
                                            <li><a href="error-400.html">Error page 400</a></li>
                                            <li><a href="error-401.html">Error page 401</a></li>
                                            <li><a href="error-403.html">Error page 403</a></li>
                                            <li><a href="error-404.html">Error page 404</a></li>
                                            <li><a href="error-500.html">Error page 500</a></li>
                                            <li><a href="error-503.html">Error page 503</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-menu">
            <ul class="nav-menus">



                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0">
                    <div class="media profile-media"><img class="b-r-10" src="../assets/images/dashboard/profile.jpg" alt="">
                        <div class="media-body"><span>Emay Walter</span>
                            <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
        <script id="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">Admin</div>
                </div>
            </div>
        </script>
        <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>
