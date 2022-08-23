<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\checkout;
use App\cart;
use Illuminate\Support\Facades\DB;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $itemorder = checkout::Paginate(20);
        

        $data = array(
            'title' => 'Data Transaksi',
            'itemorder' => $itemorder,
        );
        return view('admin.pesanan', $data)->with('no', ($request->input('page', 1) - 1) * 15);
    }
    

    public function sudahbayarbelumkirim(request $request)
    {
        $itemorder = checkout::get();
        $data = array(
            'title' => 'Data Transaksi',
            'itemorder' => $itemorder,
        );
        return view('admin.pesanan_bayar_belumkirim', $data)->with('no', ($request->input('page', 1) - 1) * 12);
    }


    public function sudahbayarsudahkirim(request $request)
    {
        $itemorder = checkout::get();
        

        $data = array(
            'title' => 'Data Transaksi',
            'itemorder' => $itemorder,
        );
        return view('admin.pesanan_bayar_kirim', $data)->with('no', ($request->input('page', 1) - 1) * 15);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
