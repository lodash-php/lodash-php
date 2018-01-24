<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\unescape;

class UnescapeTest extends TestCase
{
    public function testUnescape()
    {
        $this->assertSame('fred, barney, & pebbles', unescape('fred, barney, &amp; pebbles'));
    }
}
