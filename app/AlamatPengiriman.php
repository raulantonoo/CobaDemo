<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $table = 'alamat_pengirimen';
    protected $fillable = [
        'user_id',
        'status',
        'nama_penerima',
        'no_tlp',
        'alamat',
        //'provinsi',
        'province_id',
        //'kota',
        'city_id',
        'kecamatan',
        'kelurahan',
        'kodepos',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Province() {
        return $this->belongsTo('App\Province', 'province_id');
    }
    
    public function City() {
        return $this->belongsTo('App\City', 'city_id');
    }

}
