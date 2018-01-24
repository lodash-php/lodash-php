<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\flattenDepth;
use PHPUnit\Framework\TestCase;

class FlattenDepthTest extends TestCase
{
    public function testFlattenDepth()
    {
        $array = [1, [2, [3, [4]], 5]];
        $this->assertSame([1, 2, [3, [4]], 5], flattenDepth($array, 1));
        $this->assertSame([1, 2, 3, [4], 5], flattenDepth($array, 2));
    }
}
