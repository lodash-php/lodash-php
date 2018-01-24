<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\intersectionBy;

class IntersectionByTest extends TestCase
{
    public function testIntersectionBy()
    {
        $this->assertSame([2.1], intersectionBy([2.1, 1.2], [2.3, 3.4], 'floor'));
        $this->assertSame([['x' => 1]], intersectionBy([['x' => 1]], [['x' => 2], ['x' => 1]], 'x'));
    }
}
