<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'quantity', 'published'];

    protected $casts = ['published' => 'boolean'];

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
            'order_items',
            'product_id',
            'order_id');
    }
}
