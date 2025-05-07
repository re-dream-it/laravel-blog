@extends('layouts.admin')
@section('content')

<!--begin::Row-->
<div class="row">
    <div class="col-sm-6"><h3><b>Посты блога</b></h3></div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
    </div>
</div>
<!--end::Row-->


<div class="mb-5 d-flex flex-row mb-3">
    <form action="{{ route('admin.post.index') }}" method="get">
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
        </div>
        <button type="submit" class="btn btn-outline-primary">Применить</button>
    </form>

    <div class="mt-auto ms-auto">
        <a href="{{ route('admin.post.create') }}" class="btn btn-primary ms-auto">Добавить</a>
    </div>
</div>


<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
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

                    
                    <div class="d-flex gap-2 mt-auto pt-2">

                        <a href="{{ route('post.show', $post->id) }}" target="_blank" class="btn btn-primary w-100">Читать</a>

                            <a href="{{ route('admin.post.edit', $post->id) }}" 
                                class="btn btn-outline-primary px-4">
                                <div class="d-flex"><i class="bi bi-pencil-square me-2"></i> Редактировать</div>
                            </a>
                        
                        <form action="{{ route('post.delete', $post->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-outline-danger"
                                    onclick="return confirm('Удалить пост?')">
                                    <div class="d-flex"><i class="bi bi-trash me-2"></i> Удалить</div>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $posts->withQueryString()->links() }}
</div>


@endsection