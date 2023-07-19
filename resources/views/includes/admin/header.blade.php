{{--<nav class="navbar navbar-expand-md navbar-light bg-light">--}}
{{--    <div class="container">--}}
{{--        <a href="{{ route('admin.index') }}" class="navbar-brand">--}}
{{--            AdminPanel--}}
{{--        </a>--}}

{{--        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"--}}
{{--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbar-collapse">--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-md-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}"--}}
{{--                       aria-current="page">--}}
{{--                        {{ __('Главная') }}--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--                <li class="nav-item">--}}
{{--                    <div class="dropdown">--}}
{{--                        <x-link class="btn dropdown-toggle text-start" href="#" role="button" id="dropdownMenuLink"--}}
{{--                                data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                           Управление--}}
{{--                        </x-link>--}}

{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="{{route('admin.users.index')}}">Пользователи</a></li>--}}
{{--                            <li><a class="dropdown-item" href="{{route('admin.products.index')}}">Товары</a></li>--}}
{{--                            <li><a class="dropdown-item" href="{{route('admin.categories.index')}}">Категории</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--            </ul>--}}



{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}




<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('admin.index') }}" class="navbar-brand  ">
            AdminPanel
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
                <li class="nav-item m-2">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Мой аккаунт
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('user.account.index')}}">Личный кабинет</a></li>
                            <li><a class="dropdown-item" href="{{route('cart.index')}}">Корзина товаров</a></li>
                            <li>
                                <x-form method="POST" action="{{ route('login.logout') }}">
                                    @csrf
                                    <x-button type="submit" class="ms-1 text-dark">Выйти</x-button>
                                </x-form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
