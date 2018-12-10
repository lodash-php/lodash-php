<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\curry;

class CurryTest extends TestCase
{
    public function testCurry()
    {
        $abc = function ($a, $b, $c = null) {
            return [$a, $b, $c];
        };

        $curried = curry($abc);

        $this->assertSame([1, 2, 3], $curried(1)(2)(3));
        $this->assertSame([1, 2, 3], $curried(1, 2)(3));
        $this->assertSame([1, 2, 3], $curried(1, 2, 3));
        $this->assertSame([1, 2, null], curry($abc, 2)(1)(2));
        $this->assertSame([1, 2, 3], $curried(1)(_, 3)(2));
    }
}
