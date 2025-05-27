<!DOCTYPE html>
<html lang="en">
    {{-- Head --}}
    <head>
        @vite(['resources/js/app.js'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>redream</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous"
        />
    </head>

    {{-- Body --}}
    <body>
        {{-- Header --}}
        <div class="shadow-sm">
            <div class="container">
                <header>
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                                <img src="{{ asset('storage/src/logo.png') }}" class="d-block img-fluid rounded-3 me-1" width="50" alt="...">
    
                                <span class="fs-4">dream</span>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Главная</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('about') }}">Обо мне</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('post.index') }}">Посты</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                                    </li>
                                </ul>
                
                                <ul class="navbar-nav">
                                    @auth
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="me-2">{{ Auth::user()->name }}</span>
                                            <i class="bi bi-person-circle"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">

                                            @can('view', auth()->user())
                                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Админ-панель</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                            @endcan
                                            <li>
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Выйти</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Войти</a>
                                            <a href="{{ route('register') }}" class="btn btn-primary">Регистрация</a>
                                        </div>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
        </div>
        
        {{-- Content --}}
        @yield('content')
  
    </body> 
</html>