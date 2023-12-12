<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\intersection;

class IntersectionTest extends TestCase
{
    public function testIntersection()
    {
        $this->assertSame([2], intersection([2, 1], [2, 3]));
    }
}
