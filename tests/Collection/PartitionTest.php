<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\partition;

class PartitionTest extends TestCase
{
    public function testPartition()
    {
        $users = [
            ['user' => 'barney', 'age' => 36, 'active' => false],
            ['user' => 'fred', 'age' => 40, 'active' => true],
            ['user' => 'pebbles', 'age' => 1, 'active' => false],
        ];

        $result = [
            [
                ['user' => 'fred', 'age' => 40, 'active' => true],
            ],
            [
                ['user' => 'barney', 'age' => 36, 'active' => false],
                ['user' => 'pebbles', 'age' => 1, 'active' => false],
            ],
        ];

        $this->assertSame($result, partition($users, function ($user) {
            return $user['active'];
        }));
    }
}
