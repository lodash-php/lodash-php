<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\replace;

class ReplaceTest extends TestCase
{
    public function testReplace()
    {
        $this->assertSame('Hi Barney', replace('Hi Fred', 'Fred', 'Barney'));
        $this->assertSame('oranges are round, and oranges are juicy.', replace('Apples are round, and apples are juicy.', '/(apples)/i', 'oranges'));
        $this->assertSame('Smith, John', replace('John Smith', '/(\w+)\s(\w+)/', '$2, $1'));
        $this->assertSame('abc - 12345 - #$*%', replace('abc12345#$*%', '/([^\d]*)(\d*)([^\w]*)/', function ($string, $p1, $p2, $p3) {
            return implode(' - ', [$p1, $p2, $p3]);
        }));
    }
}
