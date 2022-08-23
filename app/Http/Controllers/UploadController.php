<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\AlamatPengiriman;
use App\checkout;
use App\bukti_pembayaran;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [

            'bukti_tf' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $produk = $request->file('gambar');

        $nama_file = time() . "_" . $produk->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';
        $produk->move($tujuan_upload, $nama_file);


        Cart::create([

            'bukti_tf' => $nama_file,

        ]);

        return redirect('/transaksi');
    }
}
