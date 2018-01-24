<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\sortBy;
use PHPUnit\Framework\TestCase;
use function _\map;
use function _\property;

class PropertyTest extends TestCase
{
    public function testIdentity()
    {
        $objects = [
            ['a' => ['b' => 2]],
            ['a' => ['b' => 1]],
        ];

        $this->assertSame([2, 1], map($objects, property('a.b')));
        $this->assertSame([1, 2], map(sortBy($objects, property(['a', 'b'])), 'a.b'));
    }
}
