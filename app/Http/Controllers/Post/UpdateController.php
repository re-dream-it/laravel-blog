<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Services\PostService;

class UpdateController extends Controller
{
    public function __construct(
        private PostService $postService
    ){}

    public function __invoke(UpdateRequest $request, Post $post){
        $data = $request->validated();
        $post = $this->postService->updatePost($post, $data);
        return redirect()->route('admin.post.index', $post->id);
    }
}
