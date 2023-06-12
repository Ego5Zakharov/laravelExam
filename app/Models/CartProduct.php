<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartProduct extends Model
{
    use HasFactory;

    protected $table = ['cart_product'];

    protected $fillable = ['quantity', 'total_price'];
    protected $casts = ['total_price' => 'integer'];

    static public function updateProductTotalPrice()
    {
        $products = Auth::user()->cart->products;
        foreach ($products as $product) {
            $product->pivot->total_price = $product->price * $product->pivot->quantity;
            $product->pivot->save();
        }
    }

    static public function getCartTotalPrice()
    {
        $total_price = Auth::user()->cart->products()->sum('total_price');
        return $total_price;
    }
}
