<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\takeWhile;

class TakeWhileTest extends TestCase
{
    public function testTakeWhile()
    {
        $users = [
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => true],
            ['user' => 'pebbles', 'active' => false],
        ];

        $this->assertSame([['user' => 'barney', 'active' => true], ['user' => 'fred', 'active' => true]], takeWhile($users, function ($value) {
            return $value['active'];
        }));
    }
}
