@extends('layouts.app')

@section('content')

<style>

    body{
        background-color: #1a1a1c;
    }
    :root {
        --gradient: linear-gradient style="color:white" (to left top, #96969e 10%, #96969e 90%) !important;
    }

    .card {
        Background-image: url(../images/ferribanditfix.png);
        Background-position: center;
        
        background-size: 400px;
        border: 3px solid #96969e;
        color: black;
        margin-bottom: 2rem;
background-color: black;

    }

    .card:hover,
    .card:focus {
        
        color:white !important;
        -webkit-background-clip: none !important;
        -webkit-text-fill-color: #fff !important;
  
        text-decoration: underline;
        text-decoration-color: white;
        transform: scale(1.065);
    }

    
.card-img-top{
   /* border: 1px solid #0d7cb3; */
}
    .btn {
        border: 2px solid;
        border-image-slice: 1;
        background: var(--gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        border-image-source: var(--gradient) !important;
        text-decoration: none ;
        color:white !important;
        transition: all .4s ease;
        -webkit-text-fill-color: white !important;
        
    }

    .btn:hover,
    .btn:focus {
        background: var(--gradient) !important;
        color:white !important;
        -webkit-background-clip: none !important;
        -webkit-text-fill-color: #fff !important;
        border: 5px solid #fff !important;
        box-shadow: #222 1px 0 10px;
        text-decoration: underline;
        text-decoration-color: white;
    }
    .judul{
        color: white;
        margin-top: 2px;
        margin-bottom: 2px;
        font-size: 30px;
    }
</style>

<div class="judul text-center" >
        <div class="col-lg-12 mt-2 text-center">
            <h1>STEERING DUMPER</h1>
        </div>
</div>

<div class="container  ">
    <div class="row  justify-content-center " style="background-color:#1a1a1c">
    
    @foreach($produk as $h)
        <div class="col-md-3 center mt-2">
          
            <div class="card text-center" >
            <div class="card-thumbnail" >
            <img width="100px"  class="card-img-top" src="{{ url('/images/'.$h->gambar) }}" style="margin:7%"  class="img-fluid" alt="">
</div>
                <div class="card-body ">
                    <h5 class="card-title" style="color:white; font-size:30px">{{$h->nama_brg}}</h5>
                    <h6 class="card-title"style="color:white; font-size:21px">{{number_format($h->harga_brg)}}</h6>
                    <p class="card-text"style="color:white; font-size:17px">{{$h->deskripsi}}</p>
                    <!-- <a href="#" class="btn mr-2"></i> KERANJANG</a> -->
                    <a href="/detailproduk/{{$h->nama_brg}}" class="btn pr-5 pl-5" ></i> DETAIL</a>
                </div>
            </div>
        
        </div> 
           @endforeach
       

   
</div>

<!-- ----------------------------------------------------------------------------------------------- -->

@endsection