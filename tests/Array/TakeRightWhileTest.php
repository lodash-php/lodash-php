<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\takeRightWhile;

class TakeRightWhileTest extends TestCase
{
    public function testTakeRightWhile()
    {
        $users = [
            ['user' => 'barney', 'active' => false],
            ['user' => 'fred', 'active' => true],
            ['user' => 'pebbles', 'active' => true],
        ];

        $this->assertSame([['user' => 'fred', 'active' => true], ['user' => 'pebbles', 'active' => true]], takeRightWhile($users, function ($value) {
            return $value['active'];
        }));
    }
}
