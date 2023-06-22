<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('admin.index') }}" class="navbar-brand">
            AdminPanel
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <div class="dropdown">
                        <x-link class="btn dropdown-toggle text-start" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                           Управление
                        </x-link>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('admin.users.index')}}">Пользователи</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.products.index')}}">Товары</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.categories.index')}}">Категории</a></li>
                        </ul>
                    </div>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item m-2">
                    <div class="dropdown">
                        <x-link class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Мой аккаунт
                        </x-link>

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
</nav><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

