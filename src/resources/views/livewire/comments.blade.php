<section class="mt-5 border-top pt-4">
    <h5 class="mb-4">
        <i class="bi bi-chat-dots"></i> <span class="ms-1">Комментарии ({{ $post->comments_count }})</span>
    </h5>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Оставить комментарий</h5>
            <form wire:submit.prevent="addComment">
                <div class="mb-3">
                    <textarea wire:model="content" class="form-control" rows="3" placeholder="Ваш комментарий..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif


    @forelse ($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle me-2 fs-4"></i>
                        <strong>{{ $comment->user->name }}</strong>
                    </div>
                    <div class="ms-auto">
                        <small class="text-muted">{{ $comment->created_at }}</small>
                        @can('delete', $comment)
                            <button wire:confirm="Вы точно хотите удалить комментарий?" wire:click="deleteComment({{ $comment->id }})" class="btn ms-1 p-0"><i class="bi bi-trash-fill"></i></button>
                        @endcan
                    </div>

                </div>
                <p class="mb-0"><i class="bi bi-chat-left-quote text-muted me-1"></i> {{ $comment->content }}</p>
                
            </div>
        </div>
    @empty
        <div class="alert alert-secondary text-center">Нет комментариев</div>
    @endforelse



</section>