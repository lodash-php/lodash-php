<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\unionBy;
use PHPUnit\Framework\TestCase;

class UnionByTest extends TestCase
{
    public function testUnionBy()
    {
        $this->assertSame([2.1, 1.2], unionBy([2.1], [1.2, 2.3], 'floor'));
        $this->assertSame([['x' => 1], ['x' => 2]], unionBy([['x' => 1]], [['x' => 2], ['x' => 1]], 'x'));
    }
}
