<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "category";
    protected $fillable = ['category'];
    public function posts()
    {
        return $this->hasMany('App\Post'); // 
    }
}
