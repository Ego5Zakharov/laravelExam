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
        //
    }

    // отдельная категория
    public function view(User $user)
    {
        return dd($user->isAdmin());
    }

    // create
    public function create(User $user)
    {
        return $user->id === 9;
    }

    // update
    public function update(User $user, Category $category)
    {
        //
    }

    // delete
    public function delete(User $user, Category $category)
    {
        //
    }

    // правила для мягкого удаления, подразумевает под собой изменение в bool значения но не трогая модель
    public function restore(User $user, Category $category)
    {
        //
    }

    // Удаление без возможности восстановления
    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
