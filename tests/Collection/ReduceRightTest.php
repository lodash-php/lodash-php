<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\reduceRight;

class ReduceRightTest extends TestCase
{
    public function testReduceRight()
    {
        $array = [[0, 1], [2, 3], [4, 5]];
        $this->assertSame([4, 5, 2, 3, 0, 1], reduceRight($array, function ($flattened, $other) {
            return \array_merge($flattened, $other);
        }, []));
    }
}
