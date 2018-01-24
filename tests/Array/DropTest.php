<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\drop;

class DropTest extends TestCase
{
    public function testDrop()
    {
        $this->assertSame([2, 3], drop([1, 2, 3]));
        $this->assertSame([3], drop([1, 2, 3], 2));
        $this->assertSame([], drop([1, 2, 3], 5));
        $this->assertSame([1, 2, 3], drop([1, 2, 3], 0));
    }
}
