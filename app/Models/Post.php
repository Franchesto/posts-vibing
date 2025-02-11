<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
        'message',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    protected static function boot()
//    {
//        parent::boot();
//        static::creating(function ($post) {
//            $post->user_id = Auth::id();
//        });
//    }
}
