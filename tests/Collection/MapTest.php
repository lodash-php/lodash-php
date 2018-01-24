<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\map;

class MapTest extends TestCase
{
    public function testChunk()
    {
        $square = function (int $n) {
            return $n * $n;
        };

        $this->assertSame([16, 64], map([4, 8], $square));
        $this->assertSame([16, 64], map((object) ['a' => 4, 'b' => 8], $square));

        $users = [
            ['user' => 'barney'],
            ['user' => 'fred'],
        ];

        $this->assertSame(['barney', 'fred'], map($users, 'user'));
        $this->assertSame(['barney', 'fred'], map(new \ArrayIterator($users), 'user'));
    }
}
