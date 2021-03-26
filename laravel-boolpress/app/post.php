<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['title', 'content', 'slug'];

    public function user(){

        return $this->belongsTo('App\User');// questa è la relazione molti a uno 
    }

    public function tags(){

        return $this->belongsToMany('App\Tag');// questa è la relazione molti a molti 
    }
}
