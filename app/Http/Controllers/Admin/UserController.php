<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $users = User::query()->latest('id')->simplePaginate(12);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $user = new User;

        return view('admin.users.create', compact('user'));
    }

    public function store(CreateUserRequest $request)
    {
        $this->authorize('create', User::class);

        $user = new User;

        $user->fill($request->only('name', 'email'));

        $password = $request->input('password')
            ?: 123;

        $user->fill(['password' => bcrypt($password)]);

        $user->save();

        return view('admin.users.show', $user);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->fill($request->only('name', 'email'));

        if ($password = $request->input('password')) {
            $user->fill(['password' => bcrypt($password)]);
        }

        $user->save();

        return view('admin.users.show', $user);
    }
}
