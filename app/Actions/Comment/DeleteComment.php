<?php

namespace App\Actions\Comment;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DeleteComment
{
    public function execute(Post $post, Comment $comment): void
    {
        Gate::authorize('delete', $comment); 
        DB::transaction(function () use ($post, $comment) {
            $comment->delete();
            $post->decrement('comments_count');
        });
    }
}