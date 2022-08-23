<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});

//login

Auth::routes();

route::group(['middleware' => [ 'role:3']], function() {
Route::get('/user', 'HomeController@index')->name('user');
    
    
});

Auth::routes();


route::group(['middleware' => [ 'role:1']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    route::get('/admin', 'AdminController@index');
    route::get('/kategori', 'AdminController@kategori');
    route::get('/produk', 'AdminController@produk');
    route::get('/useracc', 'AdminController@useracc');
    route::get('/rekening', 'AdminController@rekening');
    route::get('/service', 'AdminController@service');
    route::get('/about', 'AdminController@about');
    route::get('/aboutcontent', 'AdminController@aboutcontent');
    Route::get('/chart', 'ChartController@index')->name('chart');

    // datapesanan
Route::get('/pesanan', 'PesananController@index');
// Route::get('transaksi.gambar/{id}', 'TransaksiController@gambar')->name('transaksi.gambar');
Route::get('/pesanan', 'PesananController@index');
Route::get('/pesanan_bayar_belumkirim', 'PesananController@sudahbayarbelumkirim');
Route::get('/pesanan_bayar_kirim', 'PesananController@sudahbayarsudahkirim');
// Route::get('/pesanan_tf', 'TransaksiController@pesanan_tf')->name('pesanan_tf');
// end


});




                                                //USER
route::get('/user', 'UserController@user');
route::get('/userproduk', 'UserController@userproduk');
route::get('/userabout', 'UserController@userabout');
route::get('/useraboutcontent', 'UserController@useraboutcontent');
route::get('/keranjang', 'UserController@keranjang');
route::get('/userservice', 'UserController@userservice');

// route::get('/userabout/{judul}', 'UserController@userabout')->name('userabout');
//ABOUT


Route::get('/aboutadd', 'AdminController@aboutadd')->name('aboutadd');
Route::post('/about_process', 'AdminController@about_process');
Route::get('/about_delete/{id}', 'AdminController@about_delete')->name('about_delete');
Route::get('/aboutedit/{id}','AdminController@aboutedit');
Route::post('/about/updateabout','AdminController@updateabout');

//ABOUT UPDATE

Route::get('/aboutcontentadd', 'AdminController@aboutcontentadd')->name('aboutcontentadd');
Route::post('/aboutcontent_process', 'AdminController@aboutcontent_process');
Route::get('/aboutcontent_delete/{id}', 'AdminController@aboutcontent_delete')->name('aboutcontent_delete');
Route::get('/aboutcontentedit/{id}','AdminController@aboutcontentedit');
Route::post('/aboutcontent/updateaboutcontent','AdminController@updateaboutcontent');

                                                //PRODUK
// route::get('/produk', 'AdminController@produk');
Route::get('/produkadd', 'AdminController@produkadd')->name('produkadd');
Route::post('/produk_process', 'AdminController@produk_process');
Route::get('/produk_delete/{gambar}', 'AdminController@produk_delete')->name('produk_delete');
// Route::get('/editproduk','AdminController@editproduk');
//gamuncul css
Route::get('/produkedit/{id}','AdminController@produkedit');
Route::post('/produk/update','AdminController@update');

                                            //KATEGORI
// route::get('/kategori', 'AdminController@kategori');
Route::get('/kategoriadd', 'AdminController@kategoriadd')->name('kategoriadd');
Route::post('/kategori_process', 'AdminController@kategori_process');
Route::get('/kategori_delete/{gambar}', 'AdminController@kategori_delete')->name('kategori_delete');
Route::get('/editkategori/{id}','AdminController@editkategori');
Route::post('/kategori/updatekategori','AdminController@updatekategori');

                                            //KERANJANG
route::get('/order', 'AdminController@order');
Route::get('/orderadd', 'AdminController@orderadd')->name('orderadd');
Route::post('/order_process', 'AdminController@order_process');
Route::get('/order_delete/{gambar}', 'AdminController@order_delete')->name('order_delete');

                                            //USER ACC


                                            //TES
route::get('/tes', 'AdminController@tes');

                                            //TRANSAKSI
// route::get('/transaksi', 'AdminController@transaksi');


// Route::get('/transaksiadd', 'AdminController@transaksiadd')->name('transaksiadd');
// Route::get('/transaksi_process', 'AdminController@transaksi_process');
// route::get('/detailtransaksi', 'AdminController@detailtransaksi')->name('detailtransaksi');

                                        //detaitransaksi1
route::get('/detailtransaksi1', 'AdminController@detailtransaksi1')->name('detailtransaksi1');
Route::post('/detailtransaksi1process', 'AdminController@detailtransaksi1process');

route::get('/histori/{id_transaksi}', 'AdminController@histori');




                                            //kirim
route::get('/kirim', 'AdminController@kirim');
Route::get('/kirimadd', 'AdminController@kirimadd')->name('kirimadd');
Route::post('/kirim_process', 'AdminController@kirim_process');
Route::get('/kirim_delete/{jenis}', 'AdminController@kirim_delete')->name('kirim_delete');
Route::get('/editkirim/{id}','AdminController@editkirim');
Route::post('/kirim/updatekirim','AdminController@updatekirim');

                                            //REKENING

Route::get('/rekeningadd', 'AdminController@rekeningadd')->name('rekeningadd');
Route::post('/rekening_process', 'AdminController@rekening_process');
Route::get('/rekening_delete/{id}', 'AdminController@rekening_delete')->name('rekening_delete');

//service

Route::get('/serviceadd', 'AdminController@serviceadd')->name('serviceadd');
Route::post('/service_process', 'AdminController@service_process');
Route::get('/service_delete/{id}', 'AdminController@service_delete')->name('service_delete');
Route::get('/serviceedit/{id}','AdminController@serviceedit');
Route::post('/service/updateservice','AdminController@updateservice');




//user
route::get('/produkvelg', 'UserController@produkvelg');
route::get('/produkkaliper', 'UserController@produkkaliper');
route::get('/produkshock', 'UserController@produkshock');
route::get('/produkhelm', 'UserController@produkhelm');
route::get('/produksegitiga', 'UserController@produksegitiga');
route::get('/produksteeringdumper', 'UserController@produksteeringdumper');
route::get('/produkswingarm', 'UserController@produkswingarm');
route::get('/produkmasterrem', 'UserController@produkmasterrem');

Route::get('/detailproduk/{nama_brg}', 'UserController@detailproduk');
Route::get('/produk_search', 'UserController@search')->name('produk_search');


// shopping cart
Route::group(['middleware' => 'auth'], function() {
    // cart
    Route::resource('cart', 'CartController');
    Route::patch('kosongkan/{id}', 'CartController@kosongkan');
    // cart detail
    Route::resource('cartdetail', 'CartDetailController');
    Route::post('cartdetail.store','CartDetailController@store')->name('cartdetail.store');
  });


  Route::resource('alamatpengiriman', 'AlamatPengirimanController');
  //    Route::get('alamatpengiriman', 'AlamatPengirimanController@index')->name('alamatpengiriman');
  //   Route::get('alamatpengiriman', 'AlamatPengirimanController@index')->name('alamatpengiriman');
  //   Route::post('alamatpengiriman.store', 'AlamatPengirimanController@store')->name('alamatpengiriman.store');
  //   Route::post('alamatpengiriman.update', 'AlamatPengirimanController@update')->name('alamatpengiriman.update');
  Route::get('alamatpengiriman/ajax/{id}', 'AlamatPengirimanController@ajax')->name('alamatpengiriman.ajax');
  Route::get('checkout', 'CartController@checkout');
 Route::get('transaksi', 'TransaksiController@index')->name('transaksi');
 Route::get('transaksi.show/{id}', 'TransaksiController@show')->name('transaksi.show');
 Route::post('transaksi.store', 'TransaksiController@store')->name('transaksi.store');
 Route::get('transaksi.edit/{id}', 'TransaksiController@edit')->name('transaksi.edit');
 Route::get('transaksi.gambar/{id}', 'TransaksiController@gambar')->name('transaksi.gambar');
 Route::post('transaksi.show', 'TransaksiController@upload_tf')->name('transaksi.upload_tf');
 Route::get('transaksi.bukti_pembayaran', 'TransaksiController@bukti_pembayaran')->name('transaksi.bukti_pembayaran');
 Route::post('/bukti_process', 'TransaksiController@bukti_process');

 Route::post('transaksi.update/{id}', 'TransaksiController@update')->name('transaksi.update');
 Route::get('detailtransaksi', 'TransaksiController@detailtransaksi')->name('transaksi.detailtransaksi');

// bukti tf
Route::get('transaksi.editbuktitf/{id}', 'TransaksiController@editbuktitf')->name('transaksi.editbuktitf');
Route::post('transaksi.updatebuktitf/{id}', 'TransaksiController@updatebuktitf')->name('transaksi.updatebuktitf');
// end
// Route::resource('transaksi', 'TransaksiController');


Route::get('/ongkir', 'CheckOngkirController@index');
Route::post('/ongkir', 'CheckOngkirController@check_ongkir');
Route::get('/cities/{province_id}', 'CheckOngkirController@getCities');
  
// bukti tf
Route::resource('buktitf', BuktiTfController::class);



Route::get('/ongkir', 'CheckOngkirController@index');
Route::post('/ongkir', 'CheckOngkirController@check_ongkir')->name('ongkir');
Route::get('/cities/{province_id}', 'CheckOngkirController@getCities');


Route::post('/upload_process', 'UploadController@store');


Route::livewire('/cocol', 'cocol')->name('cocol');
Route::livewire('/cek-ongkir/{id}', 'cek-ongkir')->name('cek-ongkir');
//Route::livewire('/header', 'header')->name('header');





//ceklis
Route::get('status', 'CartDetailController@status');
Route::get('profil', 'UserController@profil')->name('profil');
Route::get('user_edit/{id}', 'UserController@user_edit')->name('user_edit');
Route::post('user_proses', 'UserController@user_proses')->name('user_proses');
Route::post('updatesubtotal', 'CartController@updatesubtotal');

//payment
Route::livewire('/payment/{id}', 'payment')->name('payment');