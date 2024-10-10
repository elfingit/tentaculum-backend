<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 10.10.24
 * Time: 10:06
 */
declare(strict_types=1);

namespace App\Common\Domain\ValueObject;

use App\Common\Domain\Exceptions\InvalidFormatException;

final class EmailValue extends StringValue
{
    public function __construct(string $value)
    {
        $this->ensureIsValidEmail($value);
        parent::__construct($value);
    }

    /**
     * @throws InvalidFormatException
     */
    public static function fromString(string $value): static
    {
        return new static($value);
    }

    private function ensureIsValidEmail(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidFormatException(
                sprintf(
                    '"%s" is not a valid email address',
                    $value
                )
            );
        }
    }
}
