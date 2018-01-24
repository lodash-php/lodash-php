<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\take;

class TakeTest extends TestCase
{
    public function testTake()
    {
        $this->assertSame([1], take([1, 2, 3]));
        $this->assertSame([1, 2], take([1, 2, 3], 2));
        $this->assertSame([1, 2, 3], take([1, 2, 3], 5));
        $this->assertSame([], take([1, 2, 3], 0));
    }
}
