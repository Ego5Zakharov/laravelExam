@can('view', App\Models\User::class)
    <div class="card mb-3">
        <div class="card-body pb-0">
            <h6 class="m-0">
                Данные юзера
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless text-nowrap mb-0">
                    <tr>
                        <td>
                            ID
                        </td>

                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Имя
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Мыло
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endcan
