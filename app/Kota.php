<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{

	protected $table = 'kota';
    public function kecamatans()
    {
        return $this->hasMany('App\Kecamatan', 'id_kota');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi', 'id_provinsi');
    }
}
