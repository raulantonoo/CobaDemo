@extends('layouts.app')

@section('content')

<style>
      body {
            font-family: 'Smooch Sans', sans-serif;
            background-color: black;

        }

        .container {
            max-width: 2000px !important;
        }

    .card {
        Background-image: url(../images/ferribanditfix.png);
        Background-position: center ;
        background-position-y: 110px;
        background-repeat: no-repeat;
        background-size: 400px;
      
        color: white;

        background-color: black;
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
</style>

@foreach($service as $a)
<div class="card p-5  text-center">
        <div class="col-lg-12 pt-5 mt-5 text-center">
        <h1>{{$a->judul}}</h1>
    </div><br>
    <div class="col-lg-7 pb-5 mb-5 m-auto text-center">
        <p>{{$a->keterangan}}</p>
    </div>
</div>





<div class="judul text-center">
    <div class="col-lg-12 mt-4 ml-5 text-justify">
        <h1>PELAYANAN</h1>
    </div>
</div>



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
                        
                        <!-- <img src="{{ asset('../images/service.jpg') }}" width="1590px " style="margin-top:-15px!important;margin-bottom:-15px;margin-left:-500px" alt=""> -->
                        <div class="card-thumbnail">

                        </div>


                    </div>
                </div>

              

            </div>

        </div>
    </div>



</div>
</div>

@endforeach

@endsection

