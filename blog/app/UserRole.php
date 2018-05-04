<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;
    
    public function user()
    {
        return $this->hasOne('App\User','user_roles_id');
    }
}
