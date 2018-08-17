<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\filter;

class FilterTest extends TestCase
{
    public function testFilter()
    {
        $users = [
            ['user' => 'barney', 'age' => 36, 'active' => true],
            ['user' => 'fred', 'age' => 40, 'active' => false],
        ];

        $this->assertSame([['user' => 'fred', 'age' => 40, 'active' => false]], filter($users, function ($o) {
            return !$o['active'];
        }));

        // The `matches` iteratee shorthand.
        $this->assertSame([['user' => 'barney', 'age' => 36, 'active' => true]], filter($users, ['age' => 36, 'active' => true]));

        // The `matchesProperty` iteratee shorthand.
        $this->assertSame([['user' => 'fred', 'age' => 40, 'active' => false]], filter($users, ['active', false]));

        // The `property` iteratee shorthand.
        $this->assertSame([['user' => 'barney', 'age' => 36, 'active' => true]], filter($users, 'active'));
    }
}
