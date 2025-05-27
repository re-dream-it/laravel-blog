@extends('layouts.main')
@section('content')

<div class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
    <img class="d-block mx-auto mb-4" src="{{ asset('storage/src/logo.png') }}" alt="" width="120">
        <h1 class="display-5 fw-bold text-white">Лучшая разработка вашего проекта</h1>
        <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">Ищете надежного разработчика сайтов, ботов, скриптов? <br>
                Я разработаю проект под ваши нужды! Готов ответить на любые вопросы и предложить вариант реализации вашего кейса. </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('contacts') }}"><button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Связаться</button>
                <a href="{{ route('post.index') }}?category_id=1"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Портфолио</button></a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div id="postsCarousel" class="carousel carousel-dark slide">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Мои работы</h2>
        </div>

        <div class="carousel-inner rounded-3 shadow-sm" style="background: #f8f9fa;">
            @foreach ($posts as $post)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex flex-column">
                        <div class="flex-grow-1" >
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 class="d-block w-100 h-100 object-fit-cover"
                                 style="object-fit: cover;">
                        </div>
                        <div class="p-3 text-center">
                            <h5 class="fw-bold mb-1">{{ $post->title }}</h5>
                            <p class="text-muted mb-0">{{ $post->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            <div class="carousel-indicators position-static mx-auto justify-content-center">
                @foreach ($posts as $key => $post)
                    <button type="button" data-bs-target="#postsCarousel" 
                            data-bs-slide-to="{{ $key }}" 
                            class="{{ $loop->first ? 'active' : '' }} mx-1 " 
                            aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
        </div>

        <div class="carousel-controls">
            <button class="carousel-control-prev p-1" type="button" data-bs-target="#postsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style="width: 1rem; height: 1rem;" aria-hidden="true"></span>
                <span class="visually-hidden">Назад</span>
            </button>
            <button class="carousel-control-next p-1" type="button" data-bs-target="#postsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" style="width: 1rem; height: 1rem;" aria-hidden="true"></span>
                <span class="visually-hidden">Далее</span>
            </button>
        </div>
    </div>
</div>

@endsection

