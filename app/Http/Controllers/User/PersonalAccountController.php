<?php

namespace App\Http\Controllers\User;

use App\Actions\Users\Account\UpdateUserAction;
use App\Actions\Users\Account\UpdateUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccount\UpdateUserAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.account.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.account.edit', compact('user'));
    }

    public function update(UpdateUserAccountRequest $request)
    {
        $user = Auth::user();

        $path = $user->avatar;

        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('uploads', 'public');
        }

        $data = (new UpdateUserData(name: $validated['name'], avatar: $path));

        (new UpdateUserAction)->run($data, $user);

        flash('Обновление данных прошло успешно!', 'success');
        return redirect()->route('user.account.index');
    }


}
