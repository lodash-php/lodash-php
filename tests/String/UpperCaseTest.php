<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\upperCase;

class UpperCaseTest extends TestCase
{
    public function testUpperCase()
    {
        $this->assertSame('FOO BAR', upperCase('--foo-bar'));
        $this->assertSame('FOO BAR', upperCase('fooBar'));
        $this->assertSame('FOO BAR', upperCase('__foo_bar__'));
    }
}
