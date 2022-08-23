<?php

namespace App\Http\Livewire;

use App\Cart;
use App\CartDetail;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Header extends Component
{
    public $jumlah = 0;


    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang',
    ];



    public function updateKeranjang()
    {
        if (Auth::user()) {
            $pesanan = Cart::where('user_id', Auth::user()->id)->where('status_cart', 'cart')->first();
            if ($pesanan) {
                $this->jumlah = CartDetail::where('cart_id', $pesanan->id)->count();
            } else {
                $this->jumlah = 0;
            }
        }
    }

    public function mount()
    {
        $this->updateKeranjang();
    }

    public function render()
    {
        return view('livewire.header', [
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
