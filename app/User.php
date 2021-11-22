<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

  /*   public function userInfo(){
        return $this-> hasOne('App\Models\UserInfo');
    } */

    // è al stessa cosa ma chiamandolo soltanto info 
    public function info(){
        return $this-> hasOne('App\Models\UserInfo', 'user_id');
    }  
    /* public function posts(){
        return $this->hasMany('App\Models\Post');
    }  */

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
}