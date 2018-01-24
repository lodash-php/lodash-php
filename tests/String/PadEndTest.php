<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\padEnd;

class PadEndTest extends TestCase
{
    public function testPadEnd()
    {
        $this->assertSame('abc   ', padEnd('abc', 6));
        $this->assertSame('abc_-_', padEnd('abc', 6, '_-'));
        $this->assertSame('abc', padEnd('abc', 2));
    }
}
