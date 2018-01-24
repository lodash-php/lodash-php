<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\repeat;

class RepeatTest extends TestCase
{
    public function testRepeat()
    {
        $this->assertSame('***', repeat('*', 3));
        $this->assertSame('abcabc', repeat('abc', 2));
        $this->assertSame('', repeat('abc', 0));
    }
}
