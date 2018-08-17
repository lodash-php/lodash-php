<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\flatMapDeep;

class FlatMapDeepTest extends TestCase
{
    public function testFlatMapDeep()
    {
        $duplicate = function ($n) {
            return [[[$n, $n]]];
        };

        $this->assertSame([1, 1, 2, 2], flatMapDeep([1, 2], $duplicate));
    }
}
