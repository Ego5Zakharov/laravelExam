
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
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
                        <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}"
                           aria-current="page">
                            {{ __('Главная') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('search.index') }}" class="nav-link {{ active_link('search.index') }}"
                           aria-current="page">
                            {{ __('Поиск Товаров') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link {{ active_link('cart.index') }}"
                           aria-current="page">
                            {{ __('Корзина') }}
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('user.account.index') }}" class="nav-link {{ active_link('user.account.index') }}"
                           aria-current="page">
                            {{ __('Личный кабинет') }}
                        </a>
                    </li>


                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-md-0">

                    <li class="nav-item m-2">
                        <div class="bg-light">Привет, {{Auth::user()->name}}</div>
                    </li>

                    <form method="POST" action="{{ route('login.logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-no-outline">{{ __('Выйти') }}</button>
                    </form>
                    </ul>
            </div>
        </div>
    </nav>
