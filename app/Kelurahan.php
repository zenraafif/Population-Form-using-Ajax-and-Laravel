<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{	
	protected $table = 'kelurahan';
    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'id_kelurahan');
    }
}
