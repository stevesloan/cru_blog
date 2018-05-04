<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    public function address()
    {
        return $this->hasOne('App\UserAddress', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\UserRole', 'user_roles_id');
    }

    public function blogPosts()
    {
        return $this->hasMany('App\BlogPost', 'author');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email',
    ];
}
