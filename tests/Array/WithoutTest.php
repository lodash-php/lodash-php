<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\without;

class WithoutTest extends TestCase
{
    public function testWithout()
    {
        $this->assertSame([3], without([2, 1, 2, 3], 1, 2));
    }
}
