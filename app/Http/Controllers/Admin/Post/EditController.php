<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        $post->load('tags');

        return view('admin.post.edit', compact('categories', 'post', 'tags'));
    }
}
