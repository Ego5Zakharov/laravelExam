<?php
//include_once(base_path().'/app/helpers.php');
//?><!---->

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{active_link('home')}}"
                       aria-current="page">
                        {{ __('Главная') }}
                    </a>
                </li>

                @auth
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item m-2">
                            {{ __('Привет, :name!', ['name' => auth()->user()->name]) }}
                        </li>

                        <form method="POST" action="{{ route('login.logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-no-outline">{{ __('Выйти') }}</button>
                        </form>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link {{active_link('register')}}"
                               aria-current="page">
                                {{ __('Регистрация') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link {{active_link('login')}}"
                               aria-current="page">
                                {{ __('Вход') }}
                            </a>
                        </li>
                    </ul>
            @endauth
        </div>
    </div>
</nav>
