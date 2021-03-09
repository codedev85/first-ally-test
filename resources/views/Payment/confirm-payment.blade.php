@extends('layouts.app')
@section('title','Confirm Payment')
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
                                    <li class="breadcrumb-item">Confirm Payment</li>
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
                                <?php
                                $rate =  session()->get('amount_sess');
                                $currency =  session()->get('currency_sess');
                                $account =  session()->get('account_sess');

                                ?>
                                <div class="col-xl-8 box-col-6 col-md-8">
                                    @if($account != 'Bank')
                                    <div class="alert alert-danger" role="alert">
                                        Currently you cant request a value not in Naira to be paid to wallet
                                    </div>
                                    @endif
                                    <div class="card o-hidden">
                                        <div class="card-header card-no-border">
                                            <div class="media">

                                                <div style="display:flex;flex-direction:column;text-align: center;">
                                                <div class="media-body">
                                                    <h4 class="f-w-500 mb-0 f-26">Confirm Payment</h4>
                                                </div>
                                                <div>
                                                    <img src="{{asset('pay/credit-card.png')}}"/>
                                                </div>
                                                <div>
                                                    <p style="font-size:20px;" class="text-success">You are about to exchange NGN  {{number_format($rate)}} for {{$currency}} @ the rate of {{$Currencyrate->rate}} </p>
                                                </div>
                                                <div>
                                                    <p style="font-size:17px;" class="text-danger">A Cashback value of {{number_format($rate/$Currencyrate->rate)}} {{$currency}} with be credited to your {{$account}}</p>
                                                </div>

                                                    <div >
                                                    @if($account == 'Bank')
                                                    <div>
                                                        <form method="POST" action="{{route('pay')}}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                            <div class="row">
                                                                <div class="col-md-8 col-md-offset-2">
                                                                    <input type="hidden" name="email" value="otemuyiwa@gmail.com">  required
                                                                    <input type="hidden" name="orderID" value="nbb">
                                                                    <input type="hidden" name="amount" value="{{$rate*100}}">  required in kobo
                                                                    <input type="hidden" name="quantity" value="1">
                                                                    <input type="hidden" name="currency" value="NGN">
                                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => auth()->user()->id,'currency' => $currency , 'acountOptions' => $account , 'convertedRate' =>  $rate/$Currencyrate->rate]) }}" >  For other necessary things you want to add to your payload. it is optional though
                                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">  required
                                                                    {{ csrf_field() }}  works only when using laravel 5.1, 5.2

                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  employ this in place of csrf_field only in laravel 5.0
                                                                        <button class="btn btn-success btn-block btn-lg" type="submit" value="Pay Now!">
                                                                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                                        </button>
                                                                </div>
                                                            </div>
                                                        </form>
{{--                                                        <form>--}}
{{--                                                            <script src="https://js.paystack.co/v1/inline.js"></script>--}}
{{--                                                            <input type="hidden" value="{{$rate}}" id="rate"/>--}}
{{--                                                            <button class="btn btn-success" type="button" onclick="payWithPaystack()"> Pay </button>--}}
{{--                                                        </form>--}}
                                                    </div>
                                                        @endif
                                                    <div>
                                                        <br>
                                                        <button class="btn btn-danger btn-block btn-lg">Cancel Payment</button>
                                                    </div>
                                                    </div>
                                                </div>


                                            </div>
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
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{--    <script>--}}
{{--        function payWithPaystack(){--}}

{{--           var rate = document.getElementById("rate").value--}}

{{--           console.log(rate)--}}
{{--            var handler = PaystackPop.setup({--}}
{{--                key: 'pk_test_20e05ff9b5eb9c701b14a644ba525e104e59021e',--}}
{{--                email: 'customer@email.com',--}}
{{--                amount: 10000,--}}
{{--                ref: ''+Math.floor((Math.random() * 1000000000) + 1),--}}

{{--                // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you--}}
{{--                metadata: {--}}
{{--                    custom_fields: [--}}
{{--                        {--}}
{{--                            display_name: "Mobile Number",--}}
{{--                            variable_name: "mobile_number",--}}
{{--                            value: "+2348012345678"--}}
{{--                        }--}}
{{--                    ]--}}
{{--                },--}}
{{--                callback: function(response){--}}
{{--                    // alert('success. transaction ref is ' + response.reference);--}}
{{--                    $.ajaxSetup({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                        }--}}
{{--                    });--}}
{{--                    $.ajax({--}}
{{--                        type: "POST",--}}
{{--                        url: "/pay",--}}
{{--                        data: { },--}}
{{--                        success: function(response) {--}}
{{--                            window.location.href = "/paymentsuccess";--}}
{{--                        },--}}
{{--                        error: function(response) {--}}
{{--                            location.reload();--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                onClose: function(){--}}
{{--                    alert('window closed');--}}
{{--                }--}}
{{--            });--}}
{{--            handler.openIframe();--}}
{{--        }--}}
{{--    </script>--}}

    </body>
    </html>
@endsection
