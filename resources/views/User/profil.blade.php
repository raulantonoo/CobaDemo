@extends('layouts.app')

@section('content')

<style>
    .card-box {
        /* border: 1px solid #ddd; */

        
        /* box-shadow: 0px 0px 10px 0px #c5c5c5; */
        /* margin-bottom: 30px; */
        /* float: left; */
     




    }

    .card-box1 {
        border: 1px solid #ddd;
        padding: 20px;
        /* box-shadow: 0px 0px 10px 0px #c5c5c5; */
        /* margin-bottom: 30px; */
        /* float: left; */
        border-radius: 10px;




    }

    /* .card-box .card-thumbnail:hover {
        transform: scale(1.5);

    }

    .card-box1 .card-thumbnail:hover {
        transform: scale(1.5);

    } */

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
        <div class="col-md-6">
            <div class="card mt-1 mb-2" style="background-color:#d7dbd8">
                <div class="  row mt-2 mb-2" style="margin:auto">
                    <h3><b>{{$user->name}}</b></h3>
                </div>
                <div class="row justify-content-center m-1" style="background-color:#1a1a1c">
                <div class="col-sm-8 col-md-6 col-lg-3">
                    <!-- Bootstrap 5 card box -->
                    <div class="box-bg m-auto mb-3 mt-4">
                        <!-- Bootstrap 5 card box -->
                   
                        <div class="card-box mt-5 rounded-circle">
                            <div class="card-thumbnail m-auto" style="border:0px">
                                <img src="{{ asset('../images/profil.png') }}" style="margin:1%;" class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                       
                    </div>
                </div>
                    <div class="col-sm-6 col-md-5 col-lg-5">
                        <!-- Bootstrap 5 card box -->
                        <div class="mb-3 ">
                            <div class="card-box1  border-0 text-left">
                                <!-- <div class="member-detail"> -->

                                <h4 class="mt-2 text-active" style="text-decoration:none;color:#d7dbd8;"><b>Nama = {{$user->name}}</b></h4>
                                <h4 style="color:#d7dbd8;line-height:2"><b>Email = {{$user->email}}</b></h4>
                                <h4 style="color:#d7dbd8"><b>No HP = {{$user->no_hp}}</b></h4>
                                
                            </div>
                        </div>
                        <a href="/user_edit/{{ $user->id }}" class="btn btn-outline-info mb-5">Edit Profil</a>
                    </div>

                </div>

            </div>
        </div>




    </div>
</div>

@endsection