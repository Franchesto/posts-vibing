<?php

namespace App\Actions;

use App\Services\LikeService;
use Illuminate\Support\Facades\Auth;

class LikeAction
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function execute(int $post_id)
    {
        $user_id = Auth::id();

        return $this->likeService->toggleLike($post_id, $user_id);
    }
}
