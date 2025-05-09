<?php

namespace App\Actions\Comment;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class DeleteComment
{
    public function execute(Post $post, Comment $comment): void
    {
        $comment->delete();
        $post->decrement('comments_count');
    }
}