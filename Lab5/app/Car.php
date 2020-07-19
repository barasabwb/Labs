<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function reviews(){
        return $this->hasMany(Reviews::class);
    }
    public function addComment($body){
//        $this->comments()->create(compact('body'));
        Reviews::create([
            'body' =>$body,
            'car_id'=> $this->id,



        ]);
    }
}
