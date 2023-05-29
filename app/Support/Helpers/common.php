<?php

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

$faker = Faker::create();

if (!function_exists('transaction')) {
    function transaction(Closure $callback, int $attempts = 1)
    {
        if (DB::transactionLevel() > 0) {
            return $callback();
        }
        return DB::transaction($callback, $attempts);
    }
}

if (!function_exists('active_link')) {
    function active_link(string $name, string $class = 'active')
    {
        return Route::is($name) ? $class : null;
    }
}

