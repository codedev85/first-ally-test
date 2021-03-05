@extends('layouts.app')
@section('title','Create Rate')
@section('content')


    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('partials.nav-bar')

        <div class="page-body-wrapper sidebar-icon">

            @include('partials.sidebar')

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>
                                    Fx Exchange </h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/home')}}"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item">Rate Create</li>
                                </ol>
                            </div>
                            <div class="col-6">
                                <!-- Bookmark Start-->
                                <div class="bookmark pull-right">
                                    <ul>
                                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                                        <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                                            <form class="form-inline search-form" action="#" method="get">
                                                <div class="form-group form-control-search">
                                                    <div class="Typeahead Typeahead--twitterUsers">
                                                        <div class="u-posRelative">
                                                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search.." name="q" title="" autofocus>
                                                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                                                        </div>
                                                        <div class="Typeahead-menu"></div>
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
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Bookmark Ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row size-column">
                        <div class="col-xl-7 box-col-12 xl-100">
                            <div class="row dash-chart">
                                <div class="col-xl-12 box-col-6 col-md-12">
                                    <div class="card o-hidden">
                                        <div class="card-header card-no-border">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="f-w-500 mb-0 f-26">Add Exchange Rate</h4>
                                                    <br>
                                                </div>
                                            </div>
                                            <form action="{{url('store/rate')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Currency</label>
                                                    <input  type="text" class="form-control" name="currency"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input  type="number" step="0.01"  class="form-control" name="rate"/>
                                                </div>
                                                <button class="btn btn-success">Add Exchange Rate</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            @include('partials.footer')

            <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw&amp;callback=initMap"></script>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/dashboard/dashboard_2.js')}}"></script>
    <script src="{{asset('assets/js/tooltip-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    </body>
    </html>
@endsection
