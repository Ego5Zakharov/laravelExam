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
        'notes', 'delivery_status', 'code',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    function generateSpecialCode($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }

        return $code;
    }

    public static function setSpecialCode($deliveryId)
    {
        $delivery = Delivery::query()->findOrFail($deliveryId);

        $delivery->code = (new Delivery)->generateSpecialCode();
        $delivery->save();
    }
}
