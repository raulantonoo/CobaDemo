@extends('layouts.app')

@section('content')

<style>
    input[type="file"] {
        display: none;

    }

    label {
        background-color: blue;
        cursor: pointer;
        padding: 0.55%;
        border-radius: 5px;

    }

    p,
    h1,
    h2,
    h3,
    h4 {
        color: white;
    }

    a {
        text-decoration: none;
        color: white !important;
    }
</style>
@section('content')

<div class="container-fluid ml-5 pl-5 mt-3">
    <td class="text-right">
       
 

        <div class=" col-md-6">
            <table class="table table-responsive" style="border:0px; color:aliceblue">
               
                    <tr class="bg-blue"style="border:0px">

                        <th style="border:0px">BANK</th>
                        <th style="border:0px">NAMA</th>
                        <th style="border:0px">REKENING</th>
                    

                    </tr>
               

                @foreach($rekening as $r)
                <tr>

                    <td style="border:0px">{{$r->bank}}</td>
                    <td style="border:0px">{{$r->nama}}</td>
                    <td style="border:0px">{{$r->rekening}}</td>
                    @endforeach

                </tr>
            </table>
        </div>
    

        <h2>Klik tombol dibawah ini untuk upload bukti pembayaran</h2>
        @if($itemorder -> cart->bukti_tf == null)
        <table class="table">
           
            <form action="{{ route('transaksi.updatebuktitf', $itemorder->id) }}" method='post' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="custom-file-upload bg-primary m-2" style="color:white">
                        <input type="file" name="bukti_tf" class="form-control" placeholder="image">
                        Masukkan Bukti Pembayaran
                    </label>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </table>
        @else
        <table class="table">
           
           <form action="{{ route('transaksi.updatebuktitf', $itemorder->id) }}" method='post' enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                   <label class="custom-file-upload bg-primary m-2" style="color:white">
                       <input type="file" name="bukti_tf" class="form-control" placeholder="image">
                      Update Bukti Pembayaran
                   </label>
                   <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                   <button class="btn btn-primary" ><a href="/transaksi">Kembali</a></button>
               </div>
           </form>
       </table>
     

        <h3>Bukti transfer:</h3>
        <br>
        <img src="/image/{{ $itemorder->cart->bukti_tf }}" width="300px"> 
         @endif
</div>
</div>
@endsection