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

namespace ArkX\Tests\Calculus;

use ArkX\Calculus\BigNumber;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class BigNumberTest extends TestCase
{
    const BASE = 200000000;

    /** @test */
    public function plus()
    {
        $number = $this->getInstance()->plus(1);

        $this->assertSame($number->toInteger(), self::BASE + 1);
    }

    /** @test */
    public function minus()
    {
        $number = $this->getInstance()->minus(1);

        $this->assertSame($number->toInteger(), self::BASE - 1);
    }

    /** @test */
    public function times()
    {
        $number = $this->getInstance()->times(2);

        $this->assertSame($number->toInteger(), self::BASE * 2);
    }

    /** @test */
    public function divided_by()
    {
        $number = $this->getInstance()->dividedBy(2);

        $this->assertSame($number->toInteger(), self::BASE / 2);
    }

    /** @test */
    public function to_float()
    {
        $this->assertSame($this->getInstance()->toFloat(), (float) self::BASE);
    }

    /** @test */
    public function to_integer()
    {
        $this->assertSame($this->getInstance()->toInteger(), self::BASE);
    }

    /** @test */
    public function to_string()
    {
        $this->assertSame($this->getInstance()->toString(), '200000000');
    }

    /** @test */
    public function to_human()
    {
        $this->assertSame($this->getInstance()->toHuman(), '2.00000000');
    }

    private function getInstance(): BigNumber
    {
        return BigNumber::create(self::BASE);
    }
}
