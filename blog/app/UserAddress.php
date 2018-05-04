<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
