<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class post extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'slug', 'cover'];

    public function user(){

        return $this->belongsTo('App\User');// questa è la relazione molti a uno 
    }

    public function tags(){

        return $this->belongsToMany('App\Tag');// questa è la relazione molti a molti 
    }
}
