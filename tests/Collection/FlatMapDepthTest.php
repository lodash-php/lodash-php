<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\flatMapDepth;
use PHPUnit\Framework\TestCase;

class FlatMapDepthTest extends TestCase
{
    public function testFlatMapDepth()
    {
        $duplicate = function ($n) {
            return [[[$n, $n]]];
        };

        $this->assertSame([[1, 1], [2, 2]], flatMapDepth([1, 2], $duplicate, 2));
    }
}
