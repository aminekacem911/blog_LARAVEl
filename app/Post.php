<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->BelongsTo('App\User','user_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
        return $this->hasOne('App\Category','cat_id'); // 
    }
   
}
