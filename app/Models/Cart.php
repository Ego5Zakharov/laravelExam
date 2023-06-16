<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['total_price'];

    protected $casts = ['total_price' => 'integer'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot(['quantity', 'total_price']);
    }

    public static function syncCartWithDatabaseAndClearSession(Request $request)
    {
        $cartData = $request->input('cart');
        $cart = json_decode($cartData, true);

        if (!empty($cart)) {
            $user = Auth::user();

            foreach ($cart as $productId => $cartItem) {
                $product = Product::query()->find($productId);

                if ($product) {
                    if ($user->cart->products()->find($product->id)) {
                        $user->cart->products()->updateExistingPivot($product->id, ['quantity' => $cartItem['quantity']]);
                    } else {
                        $user->cart->products()->attach($product->id, ['quantity' => $cartItem['quantity']]);
                    }
                }
            }
        }

        session()->forget('cart');
        session()->forget('cart.cartItemCount');
    }

    static public function getCartItemCount()
    {
        return Auth::user()->cart->products->count() ?? 0;
    }

    static public function getCartTotalPrice()
    {
        return (int)Auth::user()->cart->products()->sum(DB::raw('cart_product.quantity * products.price')) ?? 0;
    }

    static public function updateCartTotalPrice()
    {
        $cart = Auth::user()->cart;

        $cart->total_price = self::getCartTotalPrice();
        $cart->save();
    }
}
