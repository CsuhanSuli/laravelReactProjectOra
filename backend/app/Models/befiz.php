<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class befiz extends Model
{
    public $timestamps = false;
    protected $table = "befiz";
    public function ugyfel()
    {
        return $this->hasMany(ugyfel::class,"ugyfel_azon");
    }
}
