@guest
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand  ">
                {{ config('app.name') }}
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }} text-gray-600 hover:text-gray-800 text-xl md:ml-5 border-b-2 border-transparent hover:border-black"
                           aria-current="page">
                            {{ __('Главная') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ active_link('') }} text-gray-600 hover:text-gray-800 text-xl md:ml-5  border-b-2 border-transparent hover:border-black"
                           aria-current="page">
                            {{ __('О нас') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('search.index') }}" class="nav-link {{ active_link('') }} text-gray-600 hover:text-gray-800 text-xl md:ml-5 border-b-2 border-transparent hover:border-black"
                           aria-current="page">
                            {{ __('Поиск') }}
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                           class="nav-link {{active_link('register')}} text-gray-600 hover:text-gray-800 text-xl md:ml-5 border-b-2 border-transparent hover:border-black"
                           aria-current="page">
                            {{ __('Регистрация') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{active_link('login')}} text-gray-600 hover:text-gray-800 text-xl md:ml-5  border-b-2 border-transparent hover:border-black"
                           aria-current="page">
                            {{ __('Вход') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@else
    @if(Auth::user()->isAdmin())
        @include('includes.admin.header')
    @else
        @include('includes.user.header')
    @endif
@endguest


