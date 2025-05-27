<button class= "btn p-0 border-0 d-flex align-items-center gap-2 mb-3 ms-3" wire:click="toggleLike">
    <i class="bi bi-heart{{ $isLiked ? '-fill text-danger' : '' }}"></i>
    <span class="text-muted">
        <h5 class="mb-0">{{ $likesCount }}</h5>
    </span>
</button>