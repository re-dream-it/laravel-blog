@extends('layouts.admin')
@section('content')

<!--begin::Row-->
<div class="row">
    <div class="col-sm-6"><h3 class="mb-0"><h3><b>Создать пост</b></h3></h3></div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
    </div>
</div>
<!--end::Row-->


@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="postTitle" class="form-label">Название</label>
        <input type="text" class="form-control" id="postTitle" name="title" required>
    </div>

    <div class="mb-3">
        <label for="postCategory" class="form-label">Категория</label>
        <select class="form-select w-100" id="postCategory" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Теги поста</label>
        <div class="dropdown">
            <button class="btn btn-outline-secondary form-select text-start w-100" type="button" id="tagsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Выберите теги
            </button>
            <ul class="dropdown-menu w-100" aria-labelledby="tagsDropdown">
                @foreach($tags as $tag)
                    <li>
                        <div class="form-check me-2 ms-2">
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                            <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->title }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mb-3">
        <label for="postDescription" class="form-label">Описание</label>
        <input type="text" class="form-control" id="postDescription" name="description" required>
    </div>

   <div class="mb-3">
        <label for="postContent" class="form-label">Текст</label>
        <div class="" id="editor" name="content"></div>
        <textarea name="content" id="hiddenContent" style="display: none;"></textarea>
    </div>


    <div class="mb-3">
        <label for="postImage" class="form-label">Изображение</label>
        <input class="form-control" type="file" id="postImage" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Создать</button>
</form>

@endsection