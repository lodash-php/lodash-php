<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\eq;

class EqTest extends TestCase
{
    /**
     * @dataProvider equalValues
     */
    public function testIsEqual($value, $other)
    {
        $this->assertTrue(eq($value, $other));
    }

    /**
     * @dataProvider notEqualValues
     */
    public function testIsNotEqual($value, $other)
    {
        $this->assertFalse(eq($value, $other));
    }

    public function notEqualValues()
    {
        $ob1 = new StdClass();
        $ob1->a = 'b';
        $ob2 = new StdClass();

        $ob3 = new StdClass();
        $ob4 = new StdClass();

        return [
            [
                null, 'a',
            ],
            [
                0, 1,
            ],
            [
                [1], [],
            ],
            [
                ['a' => 21], ['a' => 22],
            ],
            [
                ['a' => 21], ['a' => '21'],
            ],
            [
                $ob1, $ob2,
            ],

            [
                $ob3, $ob4,
            ],
            [
                new DateTime('NOW'), new DateTime('NOW'),
            ],
        ];
    }

    public function equalValues()
    {
        $date = new DateTime('NOW');

        return [
            [
                'a', 'a',
            ],
            [
                1, 1,
            ],
            [
                [], [],
            ],
            [
                $date, $date,
            ],
            [
                INF, INF
            ]
        ];
    }
}
