@extends('layouts.app')

@section('content')


<style>
    h1 {
        font-size: 25px;
        font-weight: bold;
    }
</style>


<div class="col-md-5 m-auto">
    <div class="card " style="background-color:#1a1a1c;border-color:white">

        <!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
        <div class="col-md-12  p-4" style="background-color:#1a1a1c">
            <h1 class="text-center" style="background-color:#1a1a1c;color:white">PERBAHARUI DATA DIRI</h1>
            <form method="post" action="/user_proses" style="background-color:#1a1a1c">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="id">
              
                    <div class="form-group col-md-12" style="color:white">
                        <label>NAMA</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <div class="form-group col-md-12" style="color:white">
                        <label>EMAIL</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                    </div>
            
              
                    <div class="form-group col-md-12" style="color:white">
                        <label>NO HP</label>
                        <input type="text" class="form-control" value="{{ $user->no_hp }}" name="no_hp">
                    </div>
                 
                </div>
                <!-- membuat komponen sidebar yang berisi tombol untuk upload article -->
                <div class="col-md-12 text-center" style="height:80px" !important>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-md btn-outline-primary col-md-3" value="UPDATE">
                    </div>
                </div>
            </form>
        </div>
</div>
</div>

    @endsection