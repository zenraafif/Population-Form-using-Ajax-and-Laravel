<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    public $timestamps = false;
    protected $primaryKey = "id";
}
