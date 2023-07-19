@include('admin.includes.errors')

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label class="form-label">
                    Имя *
                </label>

                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" autofocus>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label class="form-label">
                    Мыло *
                </label>

                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label class="form-label">
                    Пароль
                </label>

                <input type="password" name="password" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4">
            <button type="submit" class="btn btn-primary w-100">
                Сохранить
            </button>
        </div>

        <div class="col-12 col-md-4">
            <a href="{{ $back }}" class="btn btn-light w-100">
                Отменить
            </a>
        </div>
    </div>
</form>
