<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\delay;
use PHPUnit\Framework\TestCase;

class DelayTest extends TestCase
{
    public function testDelay()
    {
        $a = 1;
        $time = microtime(true);
        delay(function ($increment) use (&$a) {
            $a += $increment;
        }, 20, 2);

        $this->assertSame(3, $a);
        $this->assertTrue(((microtime(true) - $time) * 1000) > 20);
    }
}
