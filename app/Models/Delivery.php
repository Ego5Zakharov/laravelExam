<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
        'address', 'country', 'city',
        'notes', 'delivery_status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
