<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\chunk;

class ChunkTest extends TestCase
{
    public function testChunk()
    {
        $this->assertSame([['a', 'b'], ['c', 'd']], chunk(['a', 'b', 'c', 'd'], 2));
        $this->assertSame([['a', 'b', 'c'], ['d']], chunk(['a', 'b', 'c', 'd'], 3));
        $this->assertSame([], chunk(null, 0));
        $this->assertSame([], chunk([], 0));
        $this->assertSame([], chunk([], -12));
        $this->assertSame([], chunk([], 22));
    }
}
