<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\pad;

class PadTest extends TestCase
{
    public function testPad()
    {
        $this->assertSame('  abc   ', pad('abc', 8));
        $this->assertSame('_-abc_-_', pad('abc', 8, '_-'));
        $this->assertSame('abc', pad('abc', 2));
    }
}
