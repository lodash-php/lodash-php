<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\each;

class EachTest extends TestCase
{
    public function testEach()
    {
        $testFunc = new \stdClass();

        $testFunc->total = 0;
        each([1, 2], function ($value) use ($testFunc) {
            $testFunc->total += $value;
        });
        $this->assertSame(3, $testFunc->total);

        $testFunc->total = 0;
        each((object) ['a' => 1, 'b' => 2], function ($value) use ($testFunc) {
            $testFunc->total += $value;
        });
        $this->assertSame(3, $testFunc->total);
    }
}
