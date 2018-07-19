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

/**
 * This is the calculator class.
 *
 * @author Brian Faust <hello@brianfaust.me>
 */
class Calculator
{
    /**
     * @var int
     */
    const ARKTOSHI = 10 ** 8;

    /**
     * @var int
     */
    protected $profitShare;

    /**
     * @var int
     */
    protected $votingPool;

    /**
     * @var int
     */
    protected $reward = 200000000;

    /**
     * Create a new calculator instance.
     *
     * @param int $votingPool
     * @param int $profitShare
     */
    public function __construct(int $votingPool, int $profitShare)
    {
        $this->votingPool  = $votingPool;
        $this->profitShare = $profitShare;
    }

    /**
     * Calculate the ARK profit share per day.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function perBlock(int $value): BigNumber
    {
        if ($value >= $this->votingPool) {
            return BigNumber::create(422)->times(self::ARKTOSHI);
        }

        return BigNumber::create($this->reward)
            ->times($this->profitShare / 100)
            ->times($value)
            ->dividedBy($this->votingPool)
            ->times(1);
    }

    /**
     * Calculate the ARK profit share per day.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function perDay(int $value): BigNumber
    {
        return $this->perBlock($value)->times(211);
    }

    /**
     * Calculate the ARK profit share per week.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function perWeek(int $value): BigNumber
    {
        return $this->perDay($value)->times(7);
    }

    /**
     * Calculate the ARK profit share per month.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function perMonth(int $value): BigNumber
    {
        return $this->perWeek($value)->times(4);
    }

    /**
     * Calculate the ARK profit share per quarter.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function perQuarter(int $value): BigNumber
    {
        return $this->perMonth($value)->times(3);
    }

    /**
     * Calculate the ARK profit share per year.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function perYear(int $value): BigNumber
    {
        return $this->perMonth($value)->times(12);
    }

    /**
     * Calculate the ARK profit share per year.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\BigNumber
     */
    public function voteWeight(int $value): BigNumber
    {
        if (0 === $this->votingPool) {
            return 0;
        }

        return BigNumber::create($value)
            ->dividedBy($this->votingPool)
            ->times(100);
    }

    /**
     * Set the reward per block.
     *
     * @param int $value
     *
     * @return \ArkX\Calculus\Calculator
     */
    public function setReward(int $value): self
    {
        $this->reward = $value;

        return $this;
    }
}
