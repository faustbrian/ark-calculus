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

use ArkX\Calculus\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class CalculatorTest extends TestCase
{
    /** @test */
    public function it_calculates_the_share_per_block()
    {
        $expected = 20000000;

        $actual = $this->getInstance()->perBlock(100);

        $this->assertSame($actual->toInteger(), $expected);
    }

    /** @test */
    public function it_calculates_the_share_per_day()
    {
        $expected = 4220000000;

        $actual = $this->getInstance()->perDay(100);

        $this->assertSame($actual->toInteger(), $expected);
    }

    /** @test */
    public function it_calculates_the_share_per_week()
    {
        $expected = 29540000000;

        $actual = $this->getInstance()->perWeek(100);

        $this->assertSame($actual->toInteger(), $expected);
    }

    /** @test */
    public function it_calculates_the_share_per_month()
    {
        $expected = 118160000000;

        $actual = $this->getInstance()->perMonth(100);

        $this->assertSame($actual->toInteger(), $expected);
    }

    /** @test */
    public function it_calculates_the_share_per_quarter()
    {
        $expected = 354480000000;

        $actual = $this->getInstance()->perQuarter(100);

        $this->assertSame($actual->toInteger(), $expected);
    }

    /** @test */
    public function it_calculates_the_share_per_year()
    {
        $expected = 1417920000000;

        $actual = $this->getInstance()->perYear(100);

        $this->assertSame($actual->toInteger(), $expected);
    }

    /** @test */
    public function it_sets_the_voting_pool()
    {
        $instance = $this->getInstance()->setVotingPool(1);

        $actual = $instance->getVotingPool();

        $this->assertSame($actual, 1);
    }

    /** @test */
    public function it_sets_the_profit_share()
    {
        $instance = $this->getInstance()->setProfitShare(1);

        $actual = $instance->getProfitShare();

        $this->assertSame($actual, 1);
    }

    /** @test */
    public function it_sets_the_reward()
    {
        $instance = $this->getInstance()->setReward(1);

        $actual = $instance->getReward();

        $this->assertSame($actual, 1);
    }

    private function getInstance(): Calculator
    {
        return new Calculator(1000, 100);
    }
}
