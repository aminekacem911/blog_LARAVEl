<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =['comment'];
    public function post(){
        return $this->BelongsTo('App\Post','post_id');
    }
    public function user(){
        return $this->BelongsTo('App\User','user_id');
    }
}
