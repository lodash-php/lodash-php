<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\findLastIndex;

class FindLastIndexTest extends TestCase
{
    public function testFindLastIndex()
    {
        $users = [
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => false],
        ];

        $this->assertSame(2, findLastIndex($users, function ($user) {
            return $user['user'] === 'pebbles';
        }));
        $this->assertSame(-1, findLastIndex($users, function ($user) {
            return $user['user'] === 'wilma';
        }));
        $this->assertSame(1, findLastIndex($users, ['user' => 'fred'], -1));
    }
}
