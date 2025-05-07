@extends('layouts.main')
@section('content')
<div class="container mt-3">

    <div class="d-flex flex-row mb-4">
        <h3><b>Посты блога</b></h3>
    </div>

    <div class="mb-5">
        <form action="{{ route('post.index') }}" method="get">
            <div class="d-flex flex-row mb-3">
                <div class="me-3">
                    <label for="postTitle" class="form-label">Название</label>
                    <input type="text" class="form-control" id="postTitle" name="title" value="{{ $requestData['title'] ?? '' }}">
                </div>

                <div class="me-3">
                    <label for="postCategory" class="form-label">Категория</label>
                    <select class="form-select" id="postCategory" name="category_id">
                        <option value="">Все категории</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ $category->id == ($requestData['category_id'] ?? '') ? ' selected' : ''}}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-primary h-50 mt-auto">Применить</button>
            </div>
        </form>
    </div>


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-2">{{ $post->title }}</h5>
    
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            @foreach ($post->tags as $tag)
                                <span class="badge text-bg-primary">{{ $tag->title }}</span>
                            @endforeach
                        </div>

                        <h6 class="card-subtitle mb-3 text-body-secondary">
                            {{ $post->category?->title ?? 'Без категории' }}
                        </h6>

                        <p class="card-text">{{ $post->description }}</p>

                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary mt-auto">Читать</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->withQueryString()->links() }}
    </div>

</div>
@endsection