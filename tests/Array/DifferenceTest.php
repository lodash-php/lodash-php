<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\difference;

class DifferenceTest extends TestCase
{
    public function testChunk()
    {
        $this->assertSame([1], difference([2, 1], [2, 3]));
    }
}
