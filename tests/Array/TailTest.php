<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\tail;

class TailTest extends TestCase
{
    public function testTail()
    {
        $this->assertSame([2, 3], tail([1, 2, 3]));
    }
}
