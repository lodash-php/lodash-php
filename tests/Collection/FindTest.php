<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\find;

class FindTest extends TestCase
{
    public function testFind()
    {
        $users = [
            ['user' => 'barney', 'age' => 36, 'active' => true],
            ['user' => 'fred', 'age' => 40, 'active' => false],
            ['user' => 'pebbles', 'age' => 1, 'active' => true],
        ];

        $this->assertSame(['user' => 'barney', 'age' => 36, 'active' => true], find($users, function ($o) {
            return $o['age'] < 40;
        }));

        // The `matches` iteratee shorthand.
        $this->assertSame(['user' => 'pebbles', 'age' => 1, 'active' => true], find($users, ['age' => 1, 'active' => true]));

        // The `matchesProperty` iteratee shorthand.
        $this->assertSame(['user' => 'fred', 'age' => 40, 'active' => false], find($users, ['active', false]));

        // The `property` iteratee shorthand.
        $this->assertSame(['user' => 'barney', 'age' => 36, 'active' => true], find($users, 'active'));
    }
}
