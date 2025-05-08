<?php

namespace App\Actions;

use App\Events\PostLiked;
use App\Models\Post;
use App\Models\User;

class LikePostAction
{
    public function execute(Post $post, User $user): void
    {
        $post->likes()->firstOrCreate(['user_id' => $user->id]);
        $post->increment('likes');
    }
}