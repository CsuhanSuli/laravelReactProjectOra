<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ugyfel extends Model
{
    public $timestamps = false;
    protected $table = "ugyfel";
    protected $primaryKey = 'azon';
        public function befiz()
    {
        return $this->hasMany(befiz::class,"ugyfel_azon");
    }
}
