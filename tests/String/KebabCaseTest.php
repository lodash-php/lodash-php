<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\kebabCase;
use PHPUnit\Framework\TestCase;

class KebabCaseTest extends TestCase
{
    public function testKebabCase()
    {
        $this->assertSame('foo-bar', kebabCase('Foo Bar'));
        $this->assertSame('foo-bar', kebabCase('fooBar'));
        $this->assertSame('foo-bar', kebabCase('__FOO_BAR__'));
    }
}
