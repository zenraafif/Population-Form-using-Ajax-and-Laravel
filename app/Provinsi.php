<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
	protected $table = 'provinsi';
    public function kotas()
    {
        return $this->hasMany('App\Kota', 'id_provinsi');
    }
}
