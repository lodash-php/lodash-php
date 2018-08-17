<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\flatMap;

class FlatMapTest extends TestCase
{
    public function testFlatMap()
    {
        $duplicate = function ($n) {
            return [$n, $n];
        };

        $this->assertSame([1, 1, 2, 2], flatMap([1, 2], $duplicate));
    }
}
