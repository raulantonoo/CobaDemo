<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\AlamatPengiriman;
use App\checkout;
use App\bukti_pembayaran;
use App\rekening;
use App\CartDetail;



class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();

        $itemorder = checkout::whereHas('cart', function ($q) use ($itemuser) {
            $q->where('status_cart', 'checkout');
            $q->where('user_id', $itemuser->id);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $data = array(
            'title' => 'Data Transaksi',
            'itemorder' => $itemorder,
            'itemuser' => $itemuser
        );
        return view('user.transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
            ->where('user_id', $itemuser->id)
            ->first();
        if ($itemcart) {
            $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)
                ->where('status', 'utama')
                ->first();
            if ($itemalamatpengiriman) {
                // buat variabel inputan order
                $inputanorder['cart_id'] = $itemcart->id;
                $inputanorder['user_id'] = $itemuser->id;
                $inputanorder['nama_penerima'] = $itemalamatpengiriman->nama_penerima;
                $inputanorder['no_tlp'] = $itemalamatpengiriman->no_tlp;
                $inputanorder['alamat'] = $itemalamatpengiriman->alamat;
                $inputanorder['provinsi'] = $itemalamatpengiriman->province->name;
                $inputanorder['kota'] = $itemalamatpengiriman->city->name;
                $inputanorder['kecamatan'] = $itemalamatpengiriman->kecamatan;
                $inputanorder['kelurahan'] = $itemalamatpengiriman->kelurahan;
                $inputanorder['kodepos'] = $itemalamatpengiriman->kodepos;
                $itemorder = checkout::create($inputanorder); //simpan order
                // update status cart
                checkout::where('id', '!=', $itemorder->id);
                $itemcart->update(['status_cart' => 'checkout']);
                return redirect()->route('transaksi')->with('success', 'Order berhasil disimpan');
            } else {
                return back()->with('error', 'Alamat pengiriman belum diisi');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            $itemorder = checkout::findOrFail($id);
            $data = array('title' => 'Detail Transaksi',
                        'itemorder' => $itemorder);
            return view('user.transaksi.show', $data)->with('no', 1);            
        } else {
            $itemorder = checkout::where('id', $id)
                            ->whereHas('cart', function($q) use ($itemuser) {
                                $q->where('user_id', $itemuser->id);
                            })->first();
            if ($itemorder) {
                $data = array('title' => 'Detail Transaksi',
                            'itemorder' => $itemorder);
                return view('user.transaksi.show', $data)->with('no', 1);                            
            } else {
                return abort('404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $itemuser = $request->user();
      
            $itemorder = checkout::where('id',$id)->first();
            // $cartdetail=CartDetail::where('cart_id')
            // ->where('status','1')->get();
            $data = array(
                'title' => 'Form Edit Transaksi',
                'itemorder' => $itemorder,
                // 'cartdetail'=>$cartdetail
               
            );
            return view('user.transaksi.edit', $data)->with('no', 1);
 
    }

    public function gambar(Request $request, $id)
    {
        $itemuser = $request->user();
      
            $itemorder = checkout::findOrFail($id);
            // $cartdetail=CartDetail::where('cart_id')
            // ->where('status','1')->get();
            $data = array(
               
                'itemorder' => $itemorder,
              
               
            );
            return view('user.transaksi.gambar', $data)->with('no', 1);
 
    }

    // public function pesanan_tf()
    // {
    //     $cart = cart::get();
       
    //         return view('admin.pesanan_tf');
 
    // }

    
    public function editbuktitf(Request $request, $id)
    {
        $rekening = rekening::get();
        $itemuser = $request->user();
      
            $itemorder = checkout::findOrFail($id);
            $data = array(
                'title' => 'Form Edit Transaksi',
                'itemorder' => $itemorder
            );
            return view('user.transaksi.uploadbuktitf', ['rekening' => $rekening], $data )->with('no', 1);
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status_pembayaran' => 'required',
            'status_pengiriman' => 'required',
            'subtotal' => 'required|numeric',
            'ongkir' => 'required|numeric',
           
            'total' => 'required|numeric',
           
          
        ]);
        $inputan = $request->all();
       
        $inputan['status_pembayaran'] = $request->status_pembayaran;
        $inputan['status_pengiriman'] = $request->status_pengiriman;
        $inputan['subtotal'] = str_replace(',','',$request->subtotal);
        $inputan['ongkir'] = str_replace(',','',$request->ongkir);
     
        $inputan['total'] = str_replace(',','',$request->total);
        $itemorder = checkout::where('id',$id)->first();
        // dd($inputan);
        // if($itemorder){
        //     $itemorder->cart->update($inputan);
        // }
        
        $itemorder->cart->update($inputan);
      // dd($itemorder->cart);
         return back()->with('success','Order berhasil diupdate');
    }

    public function updatebuktitf(Request $request, $id)
    {
        $this->validate($request,[

           
            'bukti_tf' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $inputan = $request->all();
        if ($image = $request->file('bukti_tf')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $inputan['bukti_tf'] = "$profileImage";
        }else{
            unset($inputan['bukti_tf']);
        }
     
        $itemorder = checkout::findOrFail($id);
        $itemorder->cart->update($inputan);
        return redirect('/transaksi');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detailtransaksi()
    {
        return view('user/transaksi/detailtransaksi');
    }

    // public function bukti_pembayaran(Request $request)
    // {
        
    //     $this->validate($request, [

    //         'bukti_pembayaran' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     // menyimpan data file yang diupload ke variabel $file
    //     $bukti_pembayaran = $request->file('bukti_pembayaran');

    //     $nama_file = time() . "_" . $cart->getClientOriginalName();

    //     // keterangan dengan nama folder tempat kemana file diupload
    //     $tujuan_upload = 'images';
    //     $bukti_pembayaran->move($tujuan_upload, $nama_file);


    //     cart::create([

           
    //         'bukti_pembayaran' => $nama_file,

    //     ]);

    //     return redirect('user.transaksi.index');
    // }

    public function bukti_pembayaran()
    {
        $bukti_pembayaran = bukti_pembayaran::get();
       $cart = cart::get();
        $itemorder = checkout::get();
                            
        // return view('user.transaksi.bukti_pembayaran', ['bukti_pembayaran'=>$bukti_pembayaran ,
        // 'itemorder'=> $itemorder , 'cart' => $cart]);
    }

    public function bukti_process(Request $request)
    {
        $this->validate($request, [

            'cart_id' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $produk = $request->file('gambar');

        $nama_file = time() . "_" . $produk->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';
        $produk->move($tujuan_upload, $nama_file);


        bukti_pembayaran::create([

        //    'cart_id' => $cart_id,
            'gambar' => $nama_file,

        ]);

        return redirect('/detailtransaksi');
    }

}
