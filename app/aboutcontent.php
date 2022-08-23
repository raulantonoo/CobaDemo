<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aboutcontent extends Model
{
    protected $fillable = ['id', 'judul', 'keterangan', 'gambar'];
}
