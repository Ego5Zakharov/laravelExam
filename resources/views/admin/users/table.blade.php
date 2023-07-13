<div class="card mb-3">
    <div class="card-body pb-0">
        <h6 class="m-0">
            Список юзеров
        </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless text-nowrap mb-0">
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>

                        <td>
                            <a href="{{ route('admin.users.show', $user) }}">
                                {{ $user->name }}
                            </a>
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

{{ $users->links() }}
