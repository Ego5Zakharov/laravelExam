<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    // Список категорий
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    // отдельная категория
    public function view(User $user)
    {
        return $user->isAdmin();
    }

    // create
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    // update
    public function update(User $user)
    {
        return $user->isAdmin();
    }

    // delete
    public function delete(User $user)
    {
        return $user->isAdmin();
    }

    // правила для мягкого удаления, подразумевает под собой изменение в bool значения но не трогая модель
    public function restore(User $user, Category $category)
    {
        return $user->isAdmin();
    }

    // Удаление без возможности восстановления
    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
