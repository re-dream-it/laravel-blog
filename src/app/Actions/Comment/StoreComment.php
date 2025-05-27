<?php

namespace App\Actions\Comment;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StoreComment
{
    public function execute(Post $post, User $user, string $content): void
    {
        DB::transaction(function () use ($post, $user, $content) {
            $post->comments()->create(['user_id' => $user->id, 'content' => $content]);
            $post->increment('comments_count');
        });
    }
}