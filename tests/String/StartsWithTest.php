<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\startsWith;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
    public function testStartsWith()
    {
        $this->assertTrue(startsWith('abc', 'a'));
        $this->assertTrue(startsWith('abc', 'a', -1));
        $this->assertFalse(startsWith('abc', 'a', 21));
        $this->assertFalse(startsWith('abc', 'b'));
        $this->assertTrue(startsWith('abc', 'b', 1));
    }
}
