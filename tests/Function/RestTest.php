<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\initial;
use function _\last;
use function _\rest;
use function _\size;

class RestTest extends TestCase
{
    public function testRest()
    {
        $say = rest(function ($what, $names) {
            return $what.' '.implode(', ', initial($names)).
                (size($names) > 1 ? ', & ' : '').last($names);
        });

        $this->assertSame('hello fred, barney, & pebbles', $say('hello', 'fred', 'barney', 'pebbles'));
    }
}
