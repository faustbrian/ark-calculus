<?php

declare(strict_types=1);

/*
 * This file is part of Ark Calculus.
 *
 * (c) ArkX <hello@arkx.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkX\Calculus;

use Litipk\BigNumbers\Decimal;

/**
 * This is the big number class.
 *
 * @author Brian Faust <hello@brianfaust.me>
 */
class BigNumber
{
    /**
     * @var int
     */
    const ARKTOSHI = 10 ** 8;

    /**
     * Create a new instance.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Create a new instance.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     *
     * @return \App\Math\BigNumber
     */
    public static function create($value): BigNumber
    {
        return new static(static::fromString($value));
    }

    /**
     * Create a new "Decimal" instance from a string.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     *
     * @return \Litipk\BigNumbers\Decimal
     */
    public static function fromString($value): Decimal
    {
        if ($value instanceof Decimal) {
            return $value;
        }

        return Decimal::fromString((string) $value, 8);
    }

    /**
     * Add the given value to the current value.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     *
     * @return \App\Math\BigNumber
     */
    public function plus($value): BigNumber
    {
        return new static($this->value->add(static::fromString($value)));
    }

    /**
     * Subtract the given value to the current value.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     *
     * @return \App\Math\BigNumber
     */
    public function minus($value): BigNumber
    {
        return new static($this->value->sub(static::fromString($value)));
    }

    /**
     * Multiply the current value by the given value.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     *
     * @return \App\Math\BigNumber
     */
    public function times($value): BigNumber
    {
        return new static($this->value->mul(static::fromString($value)));
    }

    /**
     * Divide the current value by the given value.
     *
     * @param \Litipk\BigNumbers\Decimal $value
     *
     * @return \App\Math\BigNumber
     */
    public function dividedBy($value): BigNumber
    {
        return new static($this->value->div(static::fromString($value)));
    }

    /**
     * Get a float representation of the object.
     *
     * @return float
     */
    public function toFloat(): float
    {
        return $this->value->asFloat();
    }

    /**
     * Get an integer representation of the object.
     *
     * @return int
     */
    public function toInteger(): int
    {
        return $this->value->asInteger();
    }

    /**
     * Get a string representation of the object.
     *
     * @return string
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * Get a human representation of the object.
     *
     * @return string
     */
    public function toHuman(): string
    {
        return (string) $this->value->div(static::fromString(self::ARKTOSHI));
    }
}
