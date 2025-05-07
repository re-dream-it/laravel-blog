<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Requests\Post\Like\DeleteRequest;
use App\Models\Like;
use App\Models\Post;


class DeleteController extends BaseController
{
    public function __invoke(DeleteRequest $request, Post $post) {
        $post->likes()->where('user_id', $request->user()->id)->delete();
        return redirect(route('post.show', $post));
    }
}
