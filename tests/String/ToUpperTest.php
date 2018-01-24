<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\toUpper;

class ToUpperTest extends TestCase
{
    public function testToUpper()
    {
        $this->assertSame('--FOO-BAR--', toUpper('--foo-bar--'));
        $this->assertSame('FOOBAR', toUpper('fooBar'));
        $this->assertSame('__FOO_BAR__', toUpper('__foo_bar__'));
    }
}
