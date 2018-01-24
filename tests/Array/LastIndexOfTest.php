<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\lastIndexOf;
use PHPUnit\Framework\TestCase;

class LastIndexOfTest extends TestCase
{
    public function testLastIndexOf()
    {
        $this->assertSame(3, lastIndexOf([1, 2, 1, 2], 2));
        $this->assertSame(1, lastIndexOf([1, 2, 1, 2], 2, 2));
        $this->assertSame(-1, lastIndexOf([1, 2, 1, 2], 12));
    }
}
