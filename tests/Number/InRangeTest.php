<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\inRange;

class InRangeTest extends TestCase
{
    /**
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public function testInRange()
    {
        $this->assertTrue(inRange(3, 2, 4));
        $this->assertTrue(inRange(4, 8));
        $this->assertFalse(inRange(4, 2));
        $this->assertFalse(inRange(2, 2));
        $this->assertTrue(inRange(1.2, 2));
        $this->assertFalse(inRange(5.2, 4));
        $this->assertTrue(inRange(-3, -2, -6));
        $this->assertTrue(inRange(4, 12));
    }
}
