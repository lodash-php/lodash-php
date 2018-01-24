<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\toLower;

class ToLowerTest extends TestCase
{
    public function testToLower()
    {
        $this->assertSame('--foo-bar--', toLower('--Foo-Bar--'));
        $this->assertSame('foobar', toLower('fooBar'));
        $this->assertSame('__foo_bar__', toLower('__FOO_BAR__'));
    }
}
