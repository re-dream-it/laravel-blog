<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin.*', function ($view) {
            $postsCount = Post::count();
            $view->with('postsCount', $postsCount);
        });
    }
}
