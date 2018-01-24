<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\zipWith;
use PHPUnit\Framework\TestCase;

class ZipWithTest extends TestCase
{
    public function testZipWith()
    {
        $this->assertSame([111, 222], zipWith([1, 2], [10, 20], [100, 200], function ($a, $b, $c) {
            return $a + $b + $c;
        }));
    }
}
