<?php

namespace App\Livewire;

use App\Http\Controllers\Post\Like\DeleteController;
use App\Http\Controllers\Post\Like\StoreController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;
    public int $likesCount;
    public bool $isLiked;


    public function mount(Post $post)
    {
        $this->post = $post;
        $this->updateLikeStatus();
    }

    public function toggleLike()
    {
        if (!Auth::check()) { return redirect()->route('login');}
        $controller = $this->isLiked ? DeleteController::class : StoreController::class;

        app($controller)($this->post, Auth::id());
        $this->updateLikeStatus();
    }

    protected function updateLikeStatus()
    {
        $this->likesCount = $this->post->likes()->count();
        $this->isLiked = $this->post->isLikedBy(Auth::id());
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}