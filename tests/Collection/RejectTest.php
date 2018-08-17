<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\reject;

class RejectTest extends TestCase
{
    public function testReject()
    {
        $users = [
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => false],
        ];

        $this->assertSame([['user' => 'fred', 'active' => false]], reject($users, 'active'));
    }
}
