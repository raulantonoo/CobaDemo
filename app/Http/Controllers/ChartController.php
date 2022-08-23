<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function index(Request $request)
    {
        $data = DB::table('produk')
            ->select(
                DB::raw('id_kategori as id_kategori'),
                DB::raw('count(*) as number')
            )
            ->groupBy('id_kategori')
            ->get();
        $array[] = ['id_kategori', 'number'];
        // dd($data);
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->id_kategori, $value->number];
        }
        return view('admin.chart')->with('id_kategori', json_encode($array));
}


}