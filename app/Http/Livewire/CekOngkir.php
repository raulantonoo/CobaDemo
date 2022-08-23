<?php

namespace App\Http\Livewire;

use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Http\Request;
use App\Cart;
use App\Models\Product;
use App\User;
use App\Model\CartDetail;
use App\AlamatPengiriman;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CekOngkir extends Component
{
    public $cart;
    private $apikey = '27359ad46fe4489629b75c0a96715693';
    public $provinsi_id, $kota_id, $jasa, $daftarProvinsi, $daftarKota, $nama_jasa;
    public $result = [];
    public function mount($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $this->cart = Cart::find($id);
    }

    public function getOngkir()
    {
        $this->alamat = AlamatPengiriman::where('user_id', Auth::user()->id)
        ->where('status', 'utama')
        ->first();
    if (!$this->alamat->province_id || !$this->alamat->city_id || !$this->jasa) {
        return;
    }
        //mengambil data cart

        $rajaongkir = new RajaOngkir($this->apikey);
        $cost = $rajaongkir->ongkosKirim([
            'origin' => 399,
            'destination' => $this->alamat->city_id,
            'weight' => 5000,
            'courier' => $this->jasa,
        ])->get();

      


        $this->nama_jasa = $cost[0]['name'];
        foreach ($cost[0]['costs'] as $row) {
            $this->result[] = array(
                'description' => $row['description'],
                'biaya' => $row['cost'][0]['value'],
                'etd' => $row['cost'][0]['etd']
            );
        }
    }
    public function save_ongkir($biaya_pengiriman)
    {

        $this->cart->ongkir = $biaya_pengiriman;
        $this->cart->total = $this->cart->subtotal+$biaya_pengiriman;
        $this->cart->update();

        return redirect()->to('checkout');
    }
    public function destroy($biaya_pengiriman)
    {
        if ($biaya_pengiriman->delete()) {
            $this->cart->total = $this->cart->subtotal-$biaya_pengiriman;
            $this->cart->update();
            return redirect()->to('checkout');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }

    public function render()
    {
        $this->alamat = AlamatPengiriman::where('user_id', Auth::user()->id)
        ->where('status', 'utama')
        ->first();
        // $rajaongkir = new RajaOngkir($this->apikey);
        // $this->daftarProvinsi = $rajaongkir->provinsi()->all();
        // if ($this->provinsi_id) {
        //     $this->daftarKota = $rajaongkir->kota()->dariProvinsi($this->provinsi_id)->get();
        // }
        return view('livewire.cek-ongkir', [
            'alamat' => $this->alamat
        ]);
    }
}