@auth
	<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
		<div class="container">
			<a href="{{ route('admin.users.index') }}" class="navbar-brand">
				Одминка
			</a>

			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="navbar-nav">
					@can('view', App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ active_link('admin.users*') }}">
                                Юзеры
                            </a>
                        </li>
                    @endcan

{{--                    @can('view', App\Models\Order::class)--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.orders') }}" class="nav-link {{ active_link('admin.orders*') }}">--}}
{{--                                Заказы--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('logs:view')--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.logs') }}" class="nav-link {{ active_link('admin.logs*') }}">--}}
{{--                                Логи--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    <li class="nav-item dropdown">--}}
{{--						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">--}}
{{--							Доступ--}}
{{--						</a>--}}

{{--						<ul class="dropdown-menu dropdown-menu-end">--}}
{{--							<li>--}}
{{--								<a href="{{ route('admin.admins') }}" class="dropdown-item">--}}
{{--									Админы--}}
{{--								</a>--}}
{{--							</li>--}}

                            {{-- <li>
								<a href="{{ route('admin.permissions') }}" class="dropdown-item">
									Полномочия
								</a>
							</li> --}}

{{--                            <li>--}}
{{--								<a href="{{ route('admin.roles') }}" class="dropdown-item">--}}
{{--									Роли--}}
{{--								</a>--}}
{{--							</li>--}}
						</ul>
					</li>
				</ul>

				<ul class="navbar-nav ms-auto">
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
							{{ Auth::user()->name }}
						</a>

{{--						<ul class="dropdown-menu dropdown-menu-end">--}}
{{--							<li>--}}
{{--								<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">--}}
{{--									Уйти...--}}
{{--								</a>--}}

{{--								<form action="{{ route('admin.logout') }}" method="POST" id="logout-form">--}}
{{--									@csrf--}}
{{--								</form>--}}
{{--							</li>--}}
{{--						</ul>--}}
					</li>
				</ul>
			</div>
		</div>
	</nav>

@endauth
