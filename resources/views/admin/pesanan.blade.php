@extends('master.master-admin')

@section('content')
<style>
    .a {
        margin-left: 2%;
        font-weight: bold;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        /* padding: 6px 12px; */

        border-top: none;
    }

    .tab {
        overflow: hidden;
        
    }

    /* Style the buttons inside the tab */
    .tab button {
color: white !important;
        float: left;
        /* border: 5px; */
        border-color: white;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 14px;
        text-align: center;
    }

    /* Change background color of buttons on hover */
   

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: white;
    }
</style>

<div class="card-body">
    <!-- digunakan untuk menampilkan pesan error atau sukses -->
    <div class="tab">
    <!-- <a href="/pesanan"><button class="btn btn-info col-md-3 pl-5 pr-5" style="margin-bottom:10px;">BELUM DIBAYAR BELUM DIKIRIM</button></a>
    <a href="/pesanan_bayar_belumkirim"><button class="btn btn-info col-md-3 pl-5 pr-5" style="margin-bottom:10px;">SUDAH DIBAYAR BELUM DIKIRIM</button></a>
    <a href="/pesanan_bayar_kirim"><button class="btn btn-info col-md-3 pl-5 pr-5" style="margin-bottom:10px;">SUDAH DIBAYAR SUDAH DIKIRIM</button></a> -->
        <button  style="color:white" class="btn btn-info col-md-4   " ><a style="color:white " href="/pesanan">BELUM DIBAYAR BELUM DIKIRIM</a></button>
        <button style="color:white" class="btn btn-info col-md-4 " ><a style="color:white " href="/pesanan_bayar_belumkirim">SUDAH DIBAYAR BELUM DIKIRIM </a></button>
        <button style="color:white" class="btn btn-info col-md-4 " ><a style="color:white " href="/pesanan_bayar_kirim">SUDAH DIBAYAR SUDAH DIKIRIM</a></button>

    </div>
    <br>
     
        <span  class="p-2 bg-success">BELUM DIBAYAR BELUM DIKIRIM</span>
<br/>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>User</th>
                    <th>Sub Total</th>
                    <th>Diskon</th>
                    <th>Ongkir</th>
                    <th>Total</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Status Pengiriman</th>
                    <th>No Resi</th>
                    <th>Opsi</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemorder as $order)
                <tr>
                    @if($order->cart->status_pembayaran=="belum" || $order->cart->status_pembayaran=="menunggu" && $order->cart->status_pengiriman=="belum")
                    <td>
                        {{ ++$no }}
                    </td>
                    <td>
                        {{ $order->cart->no_invoice }}
                    </td>
                    <td>
                        {{ $order->user->name }}
                    </td>
                    <td>
                        {{ number_format($order->cart->subtotal, 2) }}
                    </td>
                    <td>
                        {{ number_format($order->cart->diskon, 2) }}
                    </td>
                    <td>
                        {{ number_format($order->cart->ongkir, 2) }}
                    </td>
                    <td>
                        {{ number_format($order->cart->total, 2) }}
                       

                        <td>
                        <button data-toggle="modal" data-target="#bukti_tf"><a href="{{ route('transaksi.gambar', $order->id) }}">{{ $order->cart->bukti_tf }}</a></button>
                    </td>
                  
<!-- <button><a>href {{ $order->cart->bukti_tf }} -->

<td>
    {{ $order->cart->status_pembayaran }}
</td>
<td>
    {{ $order->cart->status_pengiriman }}
</td>

<td>
    {{ $order->cart->no_resi }}
</td>


<td>
    <a href="{{ route('transaksi.edit', $order->id) }}" class="btn btn-sm btn-primary mb-2">
        Edit
    </a>

</td>
@endif
</tr>
@endforeach
</tbody>
</table>
{{ $itemorder->links() }}

</div>
<!-- 
<script>
    $(document).ready(function() {
        $(document).on('click', 'gambarbtn', function() {
            var id = $(this).val();
            alert(id)
            $('#bukti_tf').modal('show')
        });
    });
</script> -->

@endsection