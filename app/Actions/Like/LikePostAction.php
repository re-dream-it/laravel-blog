<?php

namespace App\Actions\Like;

use App\Events\PostLiked;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LikePostAction
{
    public function execute(Post $post, User $user): void
    {
        DB::transaction(function () use ($post, $user) {
            $post->likes()->firstOrCreate(['user_id' => $user->id]);
            $post->increment('likes');
        });
    }
}