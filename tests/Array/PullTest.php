<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\pull;

class PullTest extends TestCase
{
    public function testPull()
    {
        $array = ['a', 'b', 'c', 'a', 'b', 'c'];
        pull($array, 'a', 'c');

        $this->assertSame(['b', 'b'], $array);
    }
}
