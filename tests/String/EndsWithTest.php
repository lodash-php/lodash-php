<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\endsWith;

class EndsWithTest extends TestCase
{
    public function testWords()
    {
        $this->assertTrue(endsWith('abc', 'c'));
        $this->assertFalse(endsWith('abc', 'c', -1));
        $this->assertTrue(endsWith('abc', 'c', 12));
        $this->assertFalse(endsWith('abc', 'b'));
        $this->assertTrue(endsWith('abc', 'b', 2));
    }
}
