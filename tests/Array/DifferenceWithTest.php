<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\differenceWith;

class DifferenceWithTest extends TestCase
{
    public function testDifferenceWith()
    {
        $objects = [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1]];

        $this->assertSame([['x' => 2, 'y' => 1]], differenceWith($objects, [['x' => 1, 'y' => 2]], '_\isEqual'));
        $this->assertSame([], differenceWith([]));
        $this->assertSame([1, 2], differenceWith([1, 2], [3, 4]));
    }
}
