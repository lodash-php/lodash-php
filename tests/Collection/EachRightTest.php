<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\eachRight;
use PHPUnit\Framework\TestCase;

class EachRightTest extends TestCase
{
    public function testForEachRight()
    {
        $test = [];
        eachRight([1, 2], function ($value) use (&$test) {
            $test[$value] = true;
        });
        $this->assertSame([2 => true, 1 => true], $test);

        $test = [];
        eachRight((object) ['a' => 1, 'b' => 2], function ($value) use (&$test) {
            $test[$value] = true;
        });
        $this->assertSame([2 => true, 1 => true], $test);
    }
}
