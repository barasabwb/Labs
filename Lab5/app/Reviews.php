<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $guarded = [];
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
