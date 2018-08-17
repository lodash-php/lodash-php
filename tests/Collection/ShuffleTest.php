<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\shuffle;
use PHPUnit\Framework\TestCase;

class ShuffleTest extends TestCase
{
    public function testShuffle()
    {
        $arr = range(1, 10);
        $this->assertNotSame($arr, shuffle($arr));
        $this->assertSame([], \array_diff($arr, shuffle($arr)));
    }
}
