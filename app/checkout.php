<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    protected $table = 'checkouts';
    protected $fillable = [
        'cart_id',
        'user_id',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kodepos',
    ];

    public function cart() {
        return $this->belongsTo('App\Cart', 'cart_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}