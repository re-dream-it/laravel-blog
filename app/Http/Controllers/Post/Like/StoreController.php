<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Requests\Post\Like\StoreRequest;
use App\Models\Post;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Post $post) {
        $post->likes()->create(['user_id' => $request->user()->id]);
        return redirect(route('post.show', $post));
    }
}
