@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col col-8">
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="row mb-2">
                <div class="col col-12 mb-2">
                    <div class="card">
                        <div class="card-header" style="background-color:#d7dbd8;color:#1a1a1c">
                            Item
                        </div>
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <!-- <th>Diskon</th> -->
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartdetail as $detail)
                                    <tr>
                                        <td>
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            {{ $detail->produk->nama_brg }}
                                            <br />

                                        <td>
                                            {{ number_format($detail->harga, 2) }}
                                        </td>
                                        <!-- <td>
                                            {{ number_format($detail->diskon, 2) }}
                                        </td> -->
                                        <td>
                                            {{ number_format($detail->qty, 2) }}
                                        </td>
                                        <td>
                                            {{ number_format($detail->subtotal, 2) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col col-12">
                    <div class="card">
                        <div class="card-header" style="background-color:#d7dbd8;color:#1a1a1c">Alamat Pengiriman</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Nama Penerima</th>
                                            <th>Alamat</th>
                                            <th>No tlp</th>
                                            <th>


                                                </td>

                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($itemalamatpengiriman)
                                        <tr>
                                            <td>
                                                {{ $itemalamatpengiriman->nama_penerima }}
                                            </td>
                                            <td>
                                                {{ $itemalamatpengiriman->alamat }}<br />
                                                {{ $itemalamatpengiriman->kelurahan}}, {{ $itemalamatpengiriman->kecamatan}}<br />
                                                {{ @$itemalamatpengiriman->city->name}}, {{ @$itemalamatpengiriman->province->name}} - {{ $itemalamatpengiriman->kodepos}}
                                            </td>
                                            </td>
                                            <td>
                                                <a href="{{ route('alamatpengiriman.index') }}" class="btn btn-success btn-sm">
                                                    Ubah Alamat
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('alamatpengiriman.index') }}" class="btn btn-sm btn-primary">
                                Tambah Alamat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-4">
            <div class="card">
                <div class="card-header" style="background-color:#d7dbd8;color:#1a1a1c">
                    Ringkasan
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>No Invoice</td>
                            <td class="text-right">
                                {{ $itemcart->no_invoice }}
                            </td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-right">
                                {{ number_format($itemcart->subtotal, 2) }}
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>Diskon</td>
                            <td class="text-right">
                                {{ number_format($itemcart->diskon, 2) }}
                            </td>
                        </tr> -->
                       

                        <tr>
                            <td>Ongkos Kirim</td>

                            <td class="text-right">
                                <a href="{{ route('cek-ongkir',$itemcart->id) }}" class="btn btn-success btn-sm">
                                    Cek Ongkir
                                </a>

                                <form action="{{ route('cart.destroy', $itemcart->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        HAPUS <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </form>
                                {{ number_format($itemcart->ongkir, 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td class="text-right">
                                {{ number_format($itemcart->total, 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
                @if ($itemcart->ongkir !==null)
                <div class="card-footer">

                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf()
                        <button type="submit" class="btn btn-danger btn-block">Buat Pesanan</button>
                    </form>
                </div>
                @else
                <div class="card-footer">

                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf()
                        <button type="submit" class="btn btn-danger btn-block" disabled>Buat Pesanan</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection