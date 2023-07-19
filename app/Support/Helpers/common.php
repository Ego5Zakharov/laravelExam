<?php

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


if (!function_exists('flash')) {
    function flash(string $message, string $type = 'success'): void
    {
        session()->flash('flash.message', $message);
        session()->flash('flash.type', $type);
    }
}

