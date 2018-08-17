<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\every;

class EveryTest extends TestCase
{
    public function testEvery()
    {
        $this->assertFalse(every([true, 1, null, 'yes'], function ($value) {
            return is_bool($value);
        }));

        $users = [
            ['user' => 'barney', 'age' => 36, 'active' => false],
            ['user' => 'fred', 'age' => 40, 'active' => false],
        ];

        // The `matches` iteratee shorthand.
        $this->assertFalse(every($users, ['user' => 'barney', 'active' => false]));

        // The `matchesProperty` iteratee shorthand.
        $this->assertTrue(every($users, ['active', false]));

        // The `property` iteratee shorthand.
        $this->assertFalse(every($users, 'active'));
    }
}
