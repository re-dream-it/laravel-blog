<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShowController extends BaseController
{
    public function __invoke($id){
        $cacheKey = 'post.' . $id;
        
        $postData = Cache::remember($cacheKey, now()->addSeconds(20), function () use ($id) {
            return Post::with(['comments', 'category', 'tags'])->findOrFail($id);
        });

        return view('post.show', ['post' => $postData]);
    }
}
