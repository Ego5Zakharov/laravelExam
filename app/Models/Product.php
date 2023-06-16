<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'quantity', 'published', 'cart_id'];

    protected $casts = ['published' => 'boolean', 'price' => 'integer'];


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class,
            'items',
            'product_id',
            'cart_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(
            Order::class,
            'order_products',
            'product_id',
            'order_id');
    }

    public static function setQuantity(Product $product, int $new_quantity)
    {
        $product->quantity = $new_quantity;
        $product->save();
    }
}
