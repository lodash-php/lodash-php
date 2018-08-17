<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\some;

class SomeTest extends TestCase
{
    public function testSome()
    {
        $users = [
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => false],
        ];

        $this->assertTrue(some([null, 0, 'yes', false], function ($value) {
            return \is_bool($value);
        }));
        $this->assertFalse(some($users, ['user' => 'barney', 'active' => false]));
        $this->assertTrue(some($users, ['active', false]));
        $this->assertTrue(some($users, 'active'));
    }
}
