<?php

namespace App\Services;

use App\Contracts\PostInterface;
use App\Models\Post;

class PostService implements PostInterface
{
    public function find()
    {
        return Post::withCount('likes')->withExists((['likes as liked' => function ($query) {
            $query->where('user_id', auth()->id());
        }]))->get();
    }
}
