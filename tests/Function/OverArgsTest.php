<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\overArgs;

class OverArgsTest extends TestCase
{
    public function testOverArgs()
    {
        function doubled($n)
        {
            return $n * 2;
        }

        function square($n)
        {
            return $n * $n;
        }

        $func = overArgs(function ($x, $y) {
            return [$x, $y];
        }, ['square', 'doubled']);

        $this->assertSame([81, 6], $func(9, 3));

        $this->assertSame([100, 10], $func(10, 5));
    }
}
