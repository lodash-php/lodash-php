<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\invokeMap;
use PHPUnit\Framework\TestCase;

class InvokeMapTest extends TestCase
{
    public function testInvokeMap()
    {
        $this->assertSame([[1, 5, 7], [1, 2, 3]], invokeMap([[5, 1, 7], [3, 2, 1]], function ($result) {
            sort($result);
            return $result;
        }));
        $this->assertSame([['1', '2', '3'], ['4', '5', '6']], invokeMap([123, 456], 'str_split'));

        $users = [
            new class() {
                public function getCount()
                {
                    return 12;
                }
            },
            new class() {
                public function getCount()
                {
                    return 24;
                }
            }
        ];

        $this->assertEquals([12, 24], invokeMap($users, 'getCount'));
    }
}
