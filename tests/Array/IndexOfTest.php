<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\indexOf;

class IndexOfTest extends TestCase
{
    public function testIndexOf()
    {
        $this->assertSame(1, indexOf([1, 2, 1, 2], 2));
        $this->assertSame(3, indexOf([1, 2, 1, 2], 2, 2));
        $this->assertSame(3, indexOf([1, 2, 1, 2], 2, -1));
    }
}
