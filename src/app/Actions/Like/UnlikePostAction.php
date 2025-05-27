<?php

namespace App\Actions\Like;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnlikePostAction
{
    public function execute(Post $post, User $user): void
    {
        DB::transaction(function () use ($post, $user) {
            $post->likes()->where('user_id', $user->id)->delete();
            $post->decrement('likes');
        });
    }
}