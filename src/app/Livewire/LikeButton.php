<?php

namespace App\Livewire;

use App\Actions\Like\LikePostAction;
use App\Actions\Like\UnlikePostAction;
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
        if (!Auth::check()) { return $this->js("alert('Требуется авторизация!')"); }
        $action = $this->isLiked ? UnlikePostAction::class : LikePostAction::class;
        app($action)->execute($this->post, Auth::user());
        $this->updateLikeStatus();
    }

    protected function updateLikeStatus()
    {
        $this->post->loadCount('likes');
        $this->likesCount = $this->post->likes_count;
        $this->isLiked = $this->post->isLikedBy(Auth::id());
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}