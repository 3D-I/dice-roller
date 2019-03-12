<?php

/**
 * PHP Dice Roller (https://github.com/bakame-php/dice-roller/)
 *
 * (c) Ignace Nyamagana Butera <nyamsprod@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bakame\DiceRoller\Test\Type;

use Bakame\DiceRoller\Exception\RollException;
use Bakame\DiceRoller\Test\Bakame;
use Bakame\DiceRoller\Type\CustomDice;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Bakame\DiceRoller\Type\CustomDice
 */
final class CustomDiceTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::toString
     * @covers ::__toString
     * @covers ::count
     * @covers ::getMinimum
     * @covers ::getMaximum
     * @covers ::roll
     */
    public function testFudgeDice(): void
    {
        $dice = new CustomDice(1, 2, 2, 4, 4);
        self::assertCount(5, $dice);
        self::assertSame(4, $dice->getMaximum());
        self::assertSame(1, $dice->getMinimum());
        self::assertSame('D[1,2,2,4,4]', (string) $dice);
        for ($i = 0; $i < 10; $i++) {
            $test = $dice->roll();
            self::assertGreaterThanOrEqual($dice->getMinimum(), $test);
            self::assertLessThanOrEqual($dice->getMaximum(), $test);
        }
    }

    /**
     * @covers ::__construct
     */
    public function testConstructorWithWrongValue(): void
    {
        self::expectException(RollException::class);
        new CustomDice(1);
    }
}