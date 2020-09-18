<?php

namespace App;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use App\User;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Cog\Laravel\Ban\Traits\Bannable;

class User extends Authenticatable implements BannableContract ,JWTSubject
{
    use Notifiable, Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','name','image','banned_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post','user_id'); // 
    }
    public function comments()
    {
        return $this->hasMany('App\Comment'); // 
    }
    public function roles(){
        return $this->BelongstoMany('App\Role');
    }
    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
            return false;
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
