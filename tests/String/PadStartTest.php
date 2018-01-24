<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\padStart;
use PHPUnit\Framework\TestCase;

class PadStartTest extends TestCase
{
    public function testPadStart()
    {
        $this->assertSame('   abc', padStart('abc', 6));
        $this->assertSame('_-_abc', padStart('abc', 6, '_-'));
        $this->assertSame('abc', padStart('abc', 2));
    }
}
