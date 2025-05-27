<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{ 
    public function __invoke(FilterRequest $request){
        $requestData = $request->validated();
        $categories = Category::all();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($requestData)]);
        $posts = Post::filter($filter)->published()->with(['category', 'tags'])->orderByDesc('id')->paginate(4);

        return view('post.index', compact('posts', 'categories', 'requestData'));
    }
}
