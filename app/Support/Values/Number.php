<?php

namespace App\Support\Values;

use Illuminate\Contracts\Database\Eloquent\Castable;
use InvalidArgumentException;
use Stringable;

class Number implements Stringable, Castable
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

    // Метод add() - выполняет сложение текущего числа с другим числом
    // и возвращает новый экземпляр класса Number с результатом сложения.
    public function add(Number|string|int|float $number, int $scale = null): static
    {
        // static - Number
        // $number = new Number($number);
        $number = new static($number);

        $value = bcadd($this->value, $number->value, $scale);

        return new static($value);
    }

    // Метод sub() - выполняет вычитание другого числа из текущего числа
    // и возвращает новый экземпляр класса Number с результатом вычитания.
    public function sub(Number|string|int|float $number, int $scale = null): static
    {
        $number = new static($number);

        $value = bcsub($this->value, $number->value, $scale);

        return new static ($value);
    }

    // Метод mul() - выполняет умножение текущего числа на другое число
    // и возвращает новый экземпляр класса Number с результатом умножения.
    public function mul(Number|string|int|float $number, int $scale = null): static
    {
        $number = new static($number);

        $value = bcmul($this->value, $number->value, $scale);

        return new static($value);
    }

    // Метод div() - выполняет деление текущего числа на другое число
    // и возвращает новый экземпляр класса Number с результатом деления.
    public function div(Number|string|float|int $number, int $scale = null): static
    {
        $number = new static($number);

        $value = bcdiv($this->value, $number->value, $scale);

        return new static($value);
    }

    // Метод eq() - сравнивает текущее число с другим числом
    // и возвращает true, если они равны, и false в противном случае.
    public function eq(Number|string|float|int $number, int $scale = null): bool
    {
        $number = new static($number);

        $result = bccomp($this->value, $number->value, $scale);

        return ($result === 0);
    }

    // Метод gt() - сравнивает текущее число с другим числом
    // и возвращает true, если текущее число больше, чем другое число, и false в противном случае.
    public function gt(Number|string|float|int $number, int $scale = null): bool
    {
        $number = new static($number);

        $result = bccomp($this->value, $number->value, $scale);

        return ($result === 1);
    }

    // Метод gte() - сравнивает текущее число с другим числом
    // и возвращает true, если текущее число больше или равно другому числу, и false в противном случае.
    public function gte(Number|string|float|int $number, int $scale = null): bool
    {
        return $this->eq($number, $scale) || $this->gt($number, $scale);
    }

    // Метод lt() - сравнивает текущее число с другим числом и возвращает true,
    // если текущее число меньше, чем другое число, и false в противном случае.
    public function lt(Number|string|float|int $number, int $scale = null): bool
    {
        $number = new static($number);

        $result = bccomp($this->value, $number->value, $scale);

        return ($result === -1);
    }

    // Метод lte() - сравнивает текущее число с другим числом
    // и возвращает true, если текущее число меньше или равно другому числу, и false в противном случае.
    public function lte(Number|string|float|int $number, int $scale = null): bool
    {
        return $this->eq($number, $scale) || $this->lt($number, $scale);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    // Метод castUsing() - определяет,
    // какое преобразование должно быть использовано при сохранении значения числа в базе данных.
    public static function castUsing(array $arguments)
    {
        return NumberCast::class;
    }
}
