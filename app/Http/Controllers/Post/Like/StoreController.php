<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;


class StoreController extends BaseController
{
    public function __invoke(Post $post, $user_id) {
        $post->likes()->create(['user_id' => $user_id]);
        return response()->json(['success' => true]);
    }
}
