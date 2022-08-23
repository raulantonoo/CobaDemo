
     <nav class="navbar navbar-expand-lg navbar-light " style="background-color:black;color:white;margin-top:0px" ;>
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
                            PRODUCT
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
                <ul class="navbar-nav ml-auto mr-0">
                    <form class="form-inline "action="/produk_search" method="GET" style="float:right">
                        <input class="form-control mr-lg-3 pr-lg-5" type="search" placeholder="Search" value="{{ old('cari') }}" name="cari" aria-label="Search">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    
                    <li class="nav-item mr-5">
                        <a class="nav-link" style="color:white; font-size:23px;" href="/cart"><img src="{{ asset('../images/cart.png') }}" width="50px" style="margin-top:-15px!important;margin-bottom:-15px;margin-right:10px;margin-left:10px"></a>
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