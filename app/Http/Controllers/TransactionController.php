<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class TransactionController extends Controller
{
    public function __invoke()
    {
        $faker = Faker::create();

        transaction(function () use ($faker) {
            Product::query()->create([
                'name' => $faker->name,
                'price' => $faker->numberBetween(50, 500)
            ]);
        });
    }
}
