<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\clamp;
use PHPUnit\Framework\TestCase;

class ClampTest extends TestCase
{
    public function testClamp()
    {
        $this->assertSame(-5, clamp(-10, -5, 5));
        $this->assertSame(5, clamp(10, -5, 5));
    }
}
