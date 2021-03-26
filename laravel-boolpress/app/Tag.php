<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Post'); // questa è la relazione molti a molti 
    }
}
