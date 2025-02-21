<?php

namespace App\Services;

use App\Contracts\PostInterface;
use App\Models\Like;

class LikeService
{
    protected $post;

    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    public function toggleLike(int $post_id, int $user_id)
    {
        $posts = $this->post->find();

        if (! $posts) {
            throw new \Exception('Post not found');
        }
        $post = $posts->find($post_id);

        if ($post->liked) {
            $post->likes_count--;
            $post->liked = false;
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        } else {
            $post->likes_count++;
            $post->liked = true;
            Like::create(['post_id' => $post_id, 'user_id' => $user_id]);
        }

        return $post;

    }
}
