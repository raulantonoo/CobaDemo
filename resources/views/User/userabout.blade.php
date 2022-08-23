<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FERRIBANDIT</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel=" manifest" href="{{asset('site.webmanifest')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/76f2dc9b0b.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Smooch+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Smooch Sans', sans-serif;
            background-color: black;

        }

        .container {
            max-width: 1800px !important;
        }

        .card {
            Background-image: url(../images/bck.jpg);
            Background-repeat: no-repeat;
            Background-position: center;
            max-height: 1000px;
            color: white
        }

        h1 {
            font-size: 50px;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
        }

        p {
            font-size: 23px;
            font-family: 'Times New Roman', Times, serif;

        }

        .card-box {
            border: 1px solid #ddd;
            padding: 20px;

            /* box-shadow: 0px 0px 10px 0px #c5c5c5; */
            /* margin-bottom: 30px; */
            /* float: left; */
            border-radius: 10px;
        }

        .judul {
            color: #d7dbd8;
            margin-top: 2px;
            margin-bottom: 2px;
            font-size: 30px;
        }
    </style>
</head>



<body>
    <!-- Navigation -->

    <nav id="navbar" class=" p-0 mr-auto  d-flex justify-content-between shadow-md navbar fixed-top navbar-expand-lg navbar-dark ">
        <div class="container mt-0" style="margin-top:0px!important">
            <img src="{{ asset('../images/ferribandit.png') }}" width="120px" style="margin-top:-15px!important;margin-bottom:-15px;margin-left:30px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-5">
                    <li class="nav-item active mr-5">
                        <a class="nav-link" style="color:white; font-size:23px;" href="/user">HOME</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" style="color:white; font-size:23px;" href="/userabout">COMPANY</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" style="color:white; font-size:23px;" href="/userservice">SERVICE</a>
                    </li>
                       <div class="dropdown mr-5">
                        <a class="nav-link dropdown-toggle" style="color:white; font-size:23px"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PRODUK
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/produkkaliper">KALIPER</a>
                            <a class="dropdown-item" href="/produkshock">SHOCK</a>
                            <a class="dropdown-item" href="/produkvelg">VELG</a>
                            <a class="dropdown-item" href="/produkhelm">HELM</a>
                            <a class="dropdown-item" href="/produksegitiga">TRIPLECLAMP ZX25R</a>
                            <a class="dropdown-item" href="/produksteeringdumper">STEERING DUMPER</a>
                            <a class="dropdown-item" href="/produkswingarm">SWING ARM</a>
                            <a class="dropdown-item" href="/produkmasterrem">MASTEM REM</a>
                        </div>
                    </div>

            

                </ul>
                <!-- <ul class="navbar-nav ml-auto mr-0">
                    <form class="form-inline "action="/produk_search" method="GET" style="float:right">
                        <input class="form-control mr-lg-3 pr-lg-5" type="search" placeholder="Search" value="{{ old('cari') }}" name="cari" aria-label="Search">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    
                    <li class="navbar-nav ml-auto mr-0">
                        <a class="pt-3 nav-link" style="color:white; font-size:23px;" href="/cart"><img src="{{ asset('../images/cart.png') }}" width="50px" style="margin-top:-15px!important;margin-bottom:-15px;margin-right:10px;margin-left:10px"></a>
                    </li>
               
                  
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;font-size:23px" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;font-size:23px" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="color: white;font-size:23px" class="nav-link dropdown-toggle" href="{{ route('login') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                    <!-- <button type="button" class="btn btn-primary btn-sm">Login</button>
                    <button type="button" class="btn btn-secondary btn-sm" style="color:white; font-size:15px">Register</button> -->

                </ul>
            </div>
        </div>
    </nav>

    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

                document.getElementById("navbar").style.background = "black";
            } else {

                document.getElementById("navbar").style.background = "none";
            }
        }
    </script>



    @foreach($about as $a)
    <div class="card p-5  text-center">
        <div class="col-lg-12 pt-5 mt-5 text-center">
            <h1>{{$a->judul}}</h1>
        </div><br>
        <div class="col-lg-7 pb-5 mb-5 m-auto text-center">
            <p>{{$a->isi}}</p>
        </div>
    </div>

    @endforeach

   

    <div class="judul text-center">
        <div class="col-lg-12 mt-4 ml-5 text-justify">
            <h1>PORTOFOLIO</h1>
        </div>
    </div>

   
    @foreach($aboutcontent as $c)
    <div class="container">
        <div class="row justify-content-center" style="background-color:black">
            <div class="col-md-12 mt-5">

                <div class="  row mt-2 mb-2" style="margin:auto">


                </div>
                <div class="row justify-content-center m-1" style="background-color:black">
                    <div class="col-sm-5 col-md-3 col-lg-4">
                        <!-- Bootstrap 5 card box -->
                        <div class="box-bg mb-3 mt-4 ">
                            <!-- Bootstrap 5 card box -->

                            <!-- <img src="{{ asset('../images/ferribandit.png') }}" width="120px" style="margin-top:-15px!important;margin-bottom:-15px;margin-left:30px"> -->
                            <img src="{{ url('/images/'.$c->gambar) }}" width="500px " style="margin-top:-15px!important;margin-bottom:-15px;margin-left:-150px" alt="">
                            <div class="card-thumbnail">

                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5 col-lg-5 ">
                        <!-- Bootstrap 5 card box -->
                        <div class="mb-4">
                            <div class="card-box1  border-0 text-justify" style="ml-2">
                                <!-- <div class="member-detail"> -->

                                <h2 style="color:#d7dbd8">{{$c->judul}}</h2>
                                <h4 style="color:black;line-height:2"><b></b> <i style="color:black;line-height:2" class="fa-solid fa-exclamation"></i></h4>
                                <p style=" color:#d7dbd8">{{$c->keterangan}}</p>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



    </div>
    </div>

    @endforeach