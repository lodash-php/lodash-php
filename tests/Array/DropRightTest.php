<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\dropRight;

class DropRightTest extends TestCase
{
    public function testDropRight()
    {
        $this->assertSame([1, 2], dropRight([1, 2, 3]));
        $this->assertSame([1], dropRight([1, 2, 3], 2));
        $this->assertSame([], dropRight([1, 2, 3], 5));
        $this->assertSame([1, 2, 3], dropRight([1, 2, 3], 0));
    }
}
