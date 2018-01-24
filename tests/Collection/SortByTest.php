<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\sortBY;

class SortByTest extends TestCase
{
    public function testSortBy()
    {
        $users = [
            ['user' => 'fred', 'age' => 48],
            ['user' => 'barney', 'age' => 36],
            ['user' => 'fred', 'age' => 40],
            ['user' => 'barney', 'age' => 34],
        ];

        $this->assertSame([['user' => 'barney', 'age' => 36], ['user' => 'barney', 'age' => 34], ['user' => 'fred', 'age' => 48], ['user' => 'fred', 'age' => 40]], sortBy($users, function ($o) {
            return $o['user'];
        }));
        $this->assertSame([['user' => 'barney', 'age' => 34], ['user' => 'barney', 'age' => 36], ['user' => 'fred', 'age' => 40], ['user' => 'fred', 'age' => 48]], sortBy($users, ['user', 'age']));
        $this->assertSame([], sortBy(null, []));
    }
}
