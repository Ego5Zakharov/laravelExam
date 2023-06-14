<?php

namespace App\Models;

use App\Support\Values\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'discount_amount',
        'total_amount',
        'order_id'
    ];

    protected $casts = [
        'amount' => Number::class,
        'discount_amount' => Number::class,
        'user_amount' => Number::class
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
