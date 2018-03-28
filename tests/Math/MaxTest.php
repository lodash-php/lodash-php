<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\max;

class MaxTest extends TestCase
{
    public function testMax()
    {
        $this->assertSame(8, max([4, 2, 8, 6]));
        $this->assertSame(null, max([]));
    }
}
