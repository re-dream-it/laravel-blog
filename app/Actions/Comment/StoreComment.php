<?php

namespace App\Actions\Comment;

use App\Models\Post;
use App\Models\User;

class StoreComment
{
    public function execute(Post $post, User $user, string $content): void
    {
        $post->comments()->firstOrCreate(['user_id' => $user->id, 'content' => $content]);
        $post->increment('comments_count');
    }
}