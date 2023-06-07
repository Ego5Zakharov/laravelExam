<?php

namespace App\Models;

use App\Support\Values\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'discount_amount',
        'user_amount'
    ];

    protected $casts = [
        'amount' => Number::class,
        'discount_amount' => Number::class,
        'user_amount' => Number::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_items',
            'order_id',
            'product_id');
    }


}
