<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\inRange;
use PHPUnit\Framework\TestCase;
use function _\random;

class RandomTest extends TestCase
{
    public function testRandom()
    {
        $this->assertTrue(inRange(random(0, 5), 0, 6));
        $this->assertTrue(random(5) <= 5);
        $this->assertTrue(inRange(random(1.2, 5.2), 1.2, 5.3));
    }
}