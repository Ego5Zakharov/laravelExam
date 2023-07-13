<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class
    ];


    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function (User $user) {
            return $user->isAdmin() ?: null;
        });
    }
}
