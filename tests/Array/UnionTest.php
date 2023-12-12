<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\union;

class UnionTest extends TestCase
{
    public function testUnion()
    {
        $this->assertSame([2, 1], union([2], [1, 2]));
    }
}
