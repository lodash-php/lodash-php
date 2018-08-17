<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\sampleSize;

class SampleSizeTest extends TestCase
{
    public function testSampleSize()
    {
        $this->assertCount(2, sampleSize([1, 2, 3], 2));
        $this->assertSame([], \array_diff(sampleSize([1, 2, 3], 2), [1, 2, 3]));

        $this->assertCount(3, sampleSize([1, 2, 3], 4));
        $this->assertSame([1, 2, 3], sampleSize([1, 2, 3], 4));
    }
}
