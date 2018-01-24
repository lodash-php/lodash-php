<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\escape;

class EscapeTest extends TestCase
{
    public function testEscape()
    {
        $this->assertSame('fred, barney, &amp; pebbles', escape('fred, barney, & pebbles'));
    }
}
