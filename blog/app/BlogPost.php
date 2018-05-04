<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'author');
    }

    protected $fillable = [
        'author', 'title', 'content',
    ];
}
