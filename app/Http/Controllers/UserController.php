<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\produk;
use App\about;
use App\kategori;
use App\aboutcontent;
use App\order;
use App\service;
use App\User;


use App\transaksi;


class UserController extends Controller
{
    //          CONTROLLER BUAT HALAMAN USER
    public function index()
    {
       
       
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $produk = DB::table('produk')
            ->where('nama_brg', 'like', "%" . $cari . "%")
            ->paginate(12);
        return view('user.userproduk', ['produk' => $produk]);
    }

    public function user()
    {
        $kategori = kategori::all();
        $produk = produk::inRandomOrder()->limit(8)->get();
       
       return view ('User.user', ['kategori' => $kategori , 'produk' => $produk]);
    }

    public function userproduk()
    { 
        $kategori = kategori::all();
         $produk = produk::all();
        // dd($produk);
        return view ('User.userproduk', ['produk' => $produk , 'kategori' => $kategori]);

    }
    
    public function userabout()
    {
      
      
        $about = about::all();
        $aboutcontent = aboutcontent::get();
       return view ('User.userabout', ['about' => $about , 'aboutcontent' => $aboutcontent]);
    }
    
    public function produkvelg()
    {
        $produk = produk::where('id_kategori', '=', '28')->paginate(12);
       return view ('User.produkvelg', ['produk' => $produk]);
    }
    public function produkkaliper()
    {
        $produk = produk::where('id_kategori', '=', '21')->paginate(12);
       return view ('User.produkkaliper', ['produk' => $produk]);
    }
    public function produkshock(Request $request)
    {
        $produk = produk::where('id_kategori', '=', '22')->paginate(12);
       return view ('User.produkshock', ['produk' => $produk]);
    }

    public function produkhelm(Request $request)
    {
        $produk = produk::where('id_kategori', '=', '23')->paginate(12);
       return view ('User.produkhelm', ['produk' => $produk]);
    }

    public function produksegitiga(Request $request)
    {
        $produk = produk::where('id_kategori', '=', '24')->paginate(12);
       return view ('User.produksegitiga', ['produk' => $produk]);
    }

    public function produksteeringdumper(Request $request)
    {
        $produk = produk::where('id_kategori', '=', '25')->paginate(12);
       return view ('User.produksteeringdumper', ['produk' => $produk]);
    }

    public function produkswingarm(Request $request)
    {
        $produk = produk::where('id_kategori', '=', '26')->paginate(12);
       return view ('User.produkswingarm', ['produk' => $produk]);
    }

    public function produkmasterrem(Request $request)
    {
        $produk = produk::where('id_kategori', '=', '26')->paginate(12);
       return view ('User.produkmasterrem', ['produk' => $produk]);
    }

    public function detailproduk(Request $request, $nama_brg)
    {


        $produk = produk::where('nama_brg', $nama_brg)->first();
            return view('User.detailproduk', ['produk' => $produk]);

    }

    public function keranjang()
    {
        $order = order::all();
       return view ('User.keranjang', ['order' => $order]);
    }

    public function userservice()
    {
        $service = service::all();
        // dd($service);
       return view ('user.userservice', ['service' => $service]);
    }

public function profil( Request $request){
    $user=$request->user();
    $user=User::where ('id',$user->id)->first();
    return view ('user.profil',['user'=>$user]);
}
public function user_edit($id){
    $user=User::where('id', $id)->first();
    return view ('user.user_edit',['user'=>$user]);
}
public function user_proses(Request $request)
{
    $id = $request->id;
   
    $name = $request->name;
    $email = $request->email;
    $no_hp = $request->no_hp;

    User::where('id', $id)
        ->update([
           
            'name' => $name,
            'email' => $email,
            'no_hp' => $no_hp,
            
        ]);

    return redirect('/profil');
}

}
