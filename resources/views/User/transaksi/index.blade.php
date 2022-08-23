@extends('layouts.app')

@section('content')



<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <!-- digunakan untuk menampilkan pesan error atau sukses -->

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Sub Total</th>
                  <th>Diskon</th>
                  <th>Ongkir</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Status Pengiriman</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemorder as $order)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $order->cart->no_invoice }}
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
                  </td>
                  <td>
                    {{ $order->cart->status_pembayaran }}
                  </td>
                  <td>
                    {{ $order->cart->status_pengiriman }}
                  </td>
                  <td>
                  <a href="{{url('payment/'.$order->id)}}" class="btn btn-sm btn-info mb-2">
                  Pilih metode pembayaran
                  </a>
                    <a href="{{ route('transaksi.show', $order->id) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    @if($order->cart->bukti_tf == null)
                    <a href="{{ route('transaksi.editbuktitf', $order->id) }}" class="btn btn-sm btn-danger mb-2">
                      Upload Bukti Tf
                    </a>
                    @else
                    <a href="{{ route('transaksi.editbuktitf', $order->id) }}" class="btn btn-sm btn-primary mb-2">
                      Cek Bukti Tf
                    </a>
                    @endif

                    @if($itemuser->role == '1')
                    <a href="{{ route('transaksi.edit', $order->id) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection