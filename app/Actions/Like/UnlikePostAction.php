<?php

namespace App\Actions\Like;

use App\Models\Post;
use App\Models\User;

class UnlikePostAction
{
    public function execute(Post $post, User $user): void
    {
        $post->likes()->where('user_id', $user->id)->delete();
        $post->decrement('likes');
    }
}