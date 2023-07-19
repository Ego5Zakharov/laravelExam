<?php

namespace App\Support\Values;

use http\Exception\InvalidArgumentException;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class NumberCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    // вызывается во время $order->amount
    public function get($model, string $key, $value, array $attributes)
    {
        return new Number($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */

    // вызывается во время
    // $order->amount = 123;
    public function set($model, string $key, $value, array $attributes)
    {
        if (!$value instanceof Number) {
            throw new InvalidArgumentException("Значение [{$key}] должно иметь тип Number.");
        }
        return $value;
    }
}
