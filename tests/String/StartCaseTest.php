<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\startCase;
use PHPUnit\Framework\TestCase;

class StartCaseTest extends TestCase
{
    public function testStartCase()
    {
        $this->assertSame('Foo Bar', startCase('--foo-bar--'));
        $this->assertSame('Foo Bar', startCase('fooBar'));
        $this->assertSame('FOO BAR', startCase('__FOO_BAR__'));
    }
}
