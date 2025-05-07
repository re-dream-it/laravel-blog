<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __construct(
        private PostService $postService
    ){}

    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $post = $this->postService->createPost($data);
        return redirect()->route('admin.post.index');
    }
}
