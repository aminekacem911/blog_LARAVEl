<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //protected $fillable = ['name','user_id'];
    public function user(){
        return $this->BelongsToMany('App\User','user_id');
    }
}