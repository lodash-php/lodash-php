<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\filter;
use function _\negate;

class NegateTest extends TestCase
{
    public function testNegate()
    {
        $isEven = function ($n) {
            return $n % 2 == 0;
        };

        $this->assertSame([1, 3, 5], filter([1, 2, 3, 4, 5, 6], negate($isEven)));
    }
}
