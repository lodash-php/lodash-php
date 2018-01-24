<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\words;

class WordsTest extends TestCase
{
    public function testWords()
    {
        $this->assertSame(['fred', 'barney', 'pebbles'], words('fred, barney, & pebbles'));
        $this->assertSame(['fred', 'barney', '&', 'pebbles'], words('fred, barney, & pebbles', '/[^, ]+/'));
        $this->assertSame([], words('fred, barney, & pebbles', '/[\d]+/'));
        $this->assertSame([], words("\u{e800}"));
    }
}
