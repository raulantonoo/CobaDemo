@extends('layouts.app')

@section('content')

<style>
    .card-box {
        border: 1px solid #ddd;
        padding: 20px;
        Background-image: url(../images/ferribanditfix.png);
        /* box-shadow: 0px 0px 10px 0px #c5c5c5; */
        /* margin-bottom: 30px; */
        /* float: left; */
        border-radius: 10px;




    }

    .card-box1 {
        border: 1px solid #ddd;
        padding: 20px;
        /* box-shadow: 0px 0px 10px 0px #c5c5c5; */
        /* margin-bottom: 30px; */
        /* float: left; */
        border-radius: 10px;




    }

    .card-box .card-thumbnail:hover {
        transform: scale(1.5);

    }

    .card-box1 .card-thumbnail:hover {
        transform: scale(1.5);

    }

    .card-box h3 a {
        font-size: 20px;
        text-decoration: none;


    }

    .card-box1 h3 a {
        font-size: 20px;
        text-decoration: none;


    }

    /* ////// */

    .box-bg {

        /* padding: 15px 15px; */
        /* border: 2px solid #e2e2e2; */
        /* border-top-left-radius: 40px;
        border-bottom-right-radius: 40px; */
        position: relative;
        /* margin: 15px 0px; */
        overflow: hidden;
    }





    /* lllll */

    /* section.our-team {
        padding: 70px 0px;
        background-color: #f2f9ff;
        text-align: center;
        color: #fff;
    } */
    .member {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
        overflow: hidden;
        transition: 0.4s;
        /* border-radius: 100%;
        border: 6px solid #ffffff; */

    }

    /* .our-team h2 {
        font-size: 36px;
        color: #795548;
        font-weight: normal;
    }

    .our-team p {
        color: #9e9e9e;
        width: 70%;
        margin: 10px auto 10px;
    } */

    .member:hover {
        box-shadow: 0px 10px 0px 0px #795548;

    }

    .member .member-info {
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
        opacity: 0;
    }

    .member .member-detail {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 10px;

    }



    .member:hover .member-info {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.83) 0%, rgba(0, 0, 0, 0.57) 20%, rgba(121, 85, 72, 0.09) 100%);
        opacity: 1;
        transition: 0.4s;

    }

    .member:hover .member-detail {
        bottom: 80px;
    }


    .btn:hover {

        background-color: black;
    }
</style>


<div class="container">
    <div class="row justify-content-center" style="background-color:black">
        <div class="col-md-11">
            <div class="card mt-1 mb-2" style="background-color:#d7dbd8">
                <div class="  row mt-2 mb-2" style="margin:auto">
                    <h3><b>{{$produk->nama_brg}}</b></h3>
                </div>
                <div class="row justify-content-center m-1" style="background-color:#1a1a1c">
                    <div class="col-sm-6 col-md-4 col-lg-5">
                        <!-- Bootstrap 5 card box -->
                        <div class="box-bg mb-3 mt-4">
                            <!-- Bootstrap 5 card box -->
                            <div class="card-box text-center" style="background-color:black">
                                <div class="card-thumbnail">
                                    <img src="{{ url('/images/'.$produk->gambar) }}" style="margin:7%" class="img-fluid" alt="">
                                </div>
                            </div>
                           
                            <div class=" mt-4 mb-2  text-center">
                                <form action="{{ route('cartdetail.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produk_id" value={{$produk->id}}>
                                    <button class="btn btn-block btn-danger" type="submit">
                                        <i class="fa fa-shopping-cart"></i> Tambahkan Ke Keranjang
                                    </button>
                                </form>

                                <!-- <br><button class="btn btn-info btn-light">Buy Now</button></br> -->
                                <!-- <button class="btn btn-danger">Add to <i class="fa-regular fa-heart"></i> -->

                                <!-- </button> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5 col-lg-5">
                        <!-- Bootstrap 5 card box -->
                        <div class="mb-3">
                            <div class="card-box1  border-0 text-left">
                                <!-- <div class="member-detail"> -->

                                <h4 class="mt-2 text-active" style="text-decoration:none;color:#d7dbd8;"><b>{{$produk->nama_brg}}</b></h4>
                                <h4 style="color:#d7dbd8;line-height:2"><b>Rp {{number_format($produk->harga_brg)}}</b></h4>
                                <p style="color:#d7dbd8"><b>Stok :</b> {{$produk->stok_brg}}</p>
                                <h4 style="color:red;line-height:2"><b>Readyyyy</b> <i style="color:red;line-height:2" class="fa-solid fa-exclamation"></i></h4>
                                <p style="color:#d7dbd8">{{$produk->deskripsi}}</p>
                                <div>
                                    <p style="color:red;line-height:2"><b>Warning </b><i style="color:red;line-height:2" class="fa-solid fa-exclamation"></i></p>
                                    <p style="color:#d7dbd8">Barang yang sudah dibeli tidak dapat dikembalikan</p>
                                    <p style="color:#d7dbd8">Barang garansi 1 minggu setelah sampai apabila ada kerusakan</p>
                                    <p style="color:#d7dbd8">Barang sesuai dengan deskripsi</p>
                                    <p style="color:#d7dbd8"><b>No Complaint</b></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>




    </div>
</div>

@endsection