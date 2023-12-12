<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\camelCase;

class CamelCaseTest extends TestCase
{
    public function testWords()
    {
        $this->assertSame('fooBar', camelCase('Foo Bar'));
        $this->assertSame('fooBar', camelCase('--foo-bar--'));
        $this->assertSame('fooBar', camelCase('__FOO_BAR__'));
    }
}
