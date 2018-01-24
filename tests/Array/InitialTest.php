<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\initial;
use PHPUnit\Framework\TestCase;

class InitialTest extends TestCase
{
    public function testInitial()
    {
        $this->assertSame([1, 2], initial([1, 2, 3]));
    }
}
