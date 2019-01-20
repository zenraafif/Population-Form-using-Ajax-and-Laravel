<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
	protected $table = 'kecamatan';
    public function kelurahans()
    {
        return $this->hasMany('App\Kelurahan');
    }

    public function kota()
    {
        return $this->belongsTo('App\Kota');
    }
}
