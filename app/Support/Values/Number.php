<?php

namespace App\Support\Values;

use Illuminate\Contracts\Database\Eloquent\Castable;
use InvalidArgumentException;
use Stringable;

class Number implements Stringable,Castable
{
    public readonly string $value;

    public function __construct(Number|string|int|float $value = 0)
    {
        if ($value instanceof static) {
            $value = $value->value;
        }
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('Значение  [{$value}] должно быть числом.');
        }
        $this->value = (string)$value;
    }

    public function add(Number|string|int|float $number, int $scale = null): static
    {
        // static - Number
        // $number = new Number($number);
        $number = new static($number);

        $value = bcadd($this->value, $number->value, $scale);

        return new static($value);
    }

    public function sub(Number|string|int|float $number, int $scale = null): static
    {
        $number = new static($number);

        $value = bcsub($this->value, $number->value, $scale);

        return new static ($value);
    }

    public function mul(Number|string|int|float $number, int $scale = null): static
    {
        $number = new static($number);

        $value = bcmul($this->value, $number->value, $scale);

        return new static($value);
    }

    public function div(Number|string|float|int $number, int $scale = null): static
    {
        $number = new static($number);

        $value = bcdiv($this->value, $number->value, $scale);

        return new static($value);
    }

    // $this->value === $number
    // тогда - вернет 0
    public function eq(Number|string|float|int $number, int $scale = null): bool
    {
        $number = new static($number);

        $result = bccomp($this->value, $number->value, $scale);

        return ($result === 0);
    }

    // $this->value > $number, после этого -
    // если true - return 1
    public function gt(Number|string|float|int $number, int $scale = null): bool
    {
        $number = new static($number);

        $result = bccomp($this->value, $number->value, $scale);

        return ($result === 1);
    }

    // $this->value > $number || $this->value === $number
    // вернет
    public function gte(Number|string|float|int $number, int $scale = null): bool
    {
        return $this->eq($number, $scale) || $this->gt($number, $scale);
    }

    // less than
    public function lt(Number|string|float|int $number, int $scale = null): bool
    {
        $number = new static($number);

        $result = bccomp($this->value, $number->value, $scale);

        return ($result === -1);
    }

    // less than or equal
    public function lte(Number|string|float|int $number, int $scale = null): bool
    {
        return $this->eq($number, $scale) || $this->lt($number, $scale);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function castUsing(array $arguments)
    {
        return NumberCast::class;
    }
}
