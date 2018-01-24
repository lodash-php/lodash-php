<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\lowerCase;

class LowerCaseTest extends TestCase
{
    public function testLowerCase()
    {
        $this->assertSame('foo bar', lowerCase('--Foo-Bar--'));
        $this->assertSame('foo bar', lowerCase('fooBar'));
        $this->assertSame('foo bar', lowerCase('__FOO_BAR__'));
    }
}
