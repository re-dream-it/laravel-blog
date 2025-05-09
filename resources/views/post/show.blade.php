@extends('layouts.main')
@section('content')
<div class="container mt-3">

<article class="container py-1">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('post.index') }}">Посты</a>
            </li>
            @if($post->category)
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('post.index', ['category_id' => $post->category->id]) }}" class="text-decoration-none">
                        {{ $post->category->title }}
                    </a>
                </li>
            @endif
        </ol>
    </nav>

    <h2 class="fw-bold mb-0 me-2">{{ $post->title }}
        @foreach($post->tags as $tag)
            <span class="badge bg-primary bg-opacity-10 text-primary">
                {{ $tag->title }}
            </span>
        @endforeach
    </h1>

    <div class="text-muted mb-3">
        <small>{{ $post->created_at->translatedFormat('d F Y, H:i') }}</small>
    </div>

    <figure class="text-center mb-4">
        <img src="{{ asset('storage/' . $post->image) }}"
             alt="{{ $post->title }}"
             class="img-fluid rounded-3 shadow"
             style="max-height: 500px; width: auto;">
        @if($post->description)
        <figcaption class="text-muted mt-2">{{ $post->description }}</figcaption>
        @endif
    </figure>

    <section class="mb-5">
        <div class="lead">{!! nl2br(e($post->content)) !!}</div>
    </section>

    @livewire('likeButton', ['post' => $post], key($post->id))


    @livewire('comments', ['post' => $post], key($post->id))

    <footer class="d-flex gap-2 border-top pt-3">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ms-auto">
            <i class="bi bi-arrow-left"></i> Назад
        </a>
    </footer>
</article>

</div>
@endsection