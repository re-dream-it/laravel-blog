<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BaseController extends Controller
{
    public function __construct()
    {
        view()->share([
            'postsCount' => Post::count(),
        ]);
    }

}