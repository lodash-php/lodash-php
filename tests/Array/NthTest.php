<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\nth;
use PHPUnit\Framework\TestCase;

class NthTest extends TestCase
{
    public function testNth()
    {
        $array = ['a', 'b', 'c', 'd'];
        $this->assertSame('b', nth($array, 1));
        $this->assertSame('c', nth($array, -2));
        $this->assertSame(null, nth($array, 12));
    }
}
