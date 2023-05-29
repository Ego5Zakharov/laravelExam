<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//POST /api/auth/register

Route::post('auth/register', [RegisterController::class, 'store']);
