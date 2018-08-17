<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\orderBy;

class OrderByTest extends TestCase
{
    public function testOrderBy()
    {
        $users = [
            ['user' => 'fred', 'age' => 48],
            ['user' => 'barney', 'age' => 34],
            ['user' => 'fred', 'age' => 40],
            ['user' => 'barney', 'age' => 36],
        ];

        $this->assertSame([['user' => 'barney', 'age' => 36], ['user' => 'barney', 'age' => 34], ['user' => 'fred', 'age' => 48], ['user' => 'fred', 'age' => 40]], orderBy($users, ['user', 'age'], ['asc', 'desc']));
    }
}
