<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bukti_pembayaran extends Model
{
    protected $fillable = ['id', 'cart_id', 'gambar'];


public function cart() {
    return $this->belongsTo('App\Cart', 'cart_id');
}

}

