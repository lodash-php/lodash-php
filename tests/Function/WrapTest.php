<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\wrap;
use PHPUnit\Framework\TestCase;

class WrapTest extends TestCase
{
    public function testWrap()
    {
        $p = wrap('_\escape', function ($func, $text) {
            return '<p>' . $func($text) . '</p>';
        });

        $this->assertSame('<p>fred, barney, &amp; pebbles</p>', $p('fred, barney, & pebbles'));
    }
}
