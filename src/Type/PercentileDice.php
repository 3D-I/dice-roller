<?php

/**
 * PHP Dice Roller (https://github.com/bakame-php/dice-roller/)
 *
 * (c) Ignace Nyamagana Butera <nyamsprod@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Bakame\DiceRoller\Type;

use Countable;
use function random_int;

final class PercentileDice implements Countable, Rollable
{
    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return 'D%';
    }

    /**
     * Returns the side count.
     *
     * @return int
     */
    public function count()
    {
        return 100;
    }

    /**
     * {@inheritdoc}
     */
    public function getMinimum(): int
    {
        return 1;
    }

    /**
     * {@inheritdoc}
     */
    public function getMaximum(): int
    {
        return 100;
    }

    /**
     * {@inheritdoc}
     */
    public function roll(): int
    {
        return random_int(1, 100);
    }
}