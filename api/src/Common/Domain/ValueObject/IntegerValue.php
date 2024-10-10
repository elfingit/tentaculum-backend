<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 10.10.24
 * Time: 10:18
 */
declare(strict_types=1);

namespace App\Common\Domain\ValueObject;

abstract class IntegerValue
{
    private function __construct(protected int $value)
    {
    }

    public static function fromInt(int $value): static
    {
        return new static($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isEqual(self $other): bool
    {
        return $this->value() === $other->value();
    }
}
