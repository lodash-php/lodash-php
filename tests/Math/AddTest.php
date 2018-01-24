<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\add;

class AddTest extends TestCase
{
    public function testAdd()
    {
        $this->assertSame(10, add(6, 4));
    }
}
