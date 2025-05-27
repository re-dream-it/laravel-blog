<?php

namespace App\Livewire;

use App\Actions\Comment\DeleteComment;
use App\Actions\Comment\StoreComment;

use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Comments extends Component
{
    public $content;
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function addComment()
    {
        if (!Auth::check()) { return $this->js("alert('Требуется авторизация!')"); }
        $content = $this->validate((new StoreRequest)->rules(), (new StoreRequest)->messages())['content'];
        app(StoreComment::class)->execute($this->post, Auth::user(), $content);
        $this->reset('content');
    }

    public function deleteComment(Comment $comment)
    {
        Gate::allows('delete-comment', $comment) ? app(DeleteComment::class)->execute($this->post, $comment) : $this->js("alert('Это чужой комментарий!')");
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
