<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;


class DeleteController extends BaseController
{
    public function __invoke(Post $post, $user_id) {
        $post->likes()->where('user_id', $user_id)->delete();
        return response()->json(['success' => true]);
    }
}
