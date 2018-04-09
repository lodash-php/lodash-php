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
        $this->assertNotSame([1, 2, 3, 4], shuffle([1, 2, 3, 4]));
        $this->assertSame([1, 2, 3, 4], \array_values(shuffle([1, 2, 3, 4])));
    }
}