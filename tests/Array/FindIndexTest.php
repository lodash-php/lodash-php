<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\findIndex;

class FindIndexTest extends TestCase
{
    public function testFindIndex()
    {
        $users = [
            ['user' => 'barney', 'active' => false],
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => true],
        ];

        $this->assertSame(2, findIndex($users, function ($user) {
            return $user['user'] === 'pebbles';
        }));
        $this->assertSame(1, findIndex($users, ['user' => 'fred', 'active' => false]));
        $this->assertSame(0, findIndex($users, ['active', false]));
        $this->assertSame(2, findIndex($users, 'active'));
        $this->assertSame(-1, findIndex([], 'active'));
        $this->assertSame(2, findIndex($users, 'active', -2));
        $this->assertSame(-1, findIndex($users, 'nothing'));
    }
}
