<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\intersectionWith;

class IntersectionWithTest extends TestCase
{
    public function testIntersectionWith()
    {
        $objects = [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1]];
        $others = [['x' => 1, 'y' => 1], ['x' => 1, 'y' => 2]];

        $this->assertSame([['x' => 1, 'y' => 2]], intersectionWith($objects, $others, '_\isEqual'));
        $this->assertSame([['x' => 1, 'y' => 2]], intersectionWith($objects, $others));
    }
}
