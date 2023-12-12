<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\last;

class LastTest extends TestCase
{
    public function testLast()
    {
        $this->assertSame(3, last([1, 2, 3]));
    }
}
