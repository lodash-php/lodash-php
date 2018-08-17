<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\reduce;

class ReduceTest extends TestCase
{
    public function testReduce()
    {
        $this->assertSame(3, reduce([1, 2], function ($sum, $n) {
            return $sum + $n;
        }, 0));
        $this->assertSame(['1' => ['a', 'c'], '2' => ['b']], reduce(['a' => 1, 'b' => 2, 'c' => 1], function ($result, $value, $key) {
            if (!isset($result[$value])) {
                $result[$value] = [];
            }
            $result[$value][] = $key;

            return $result;
        }, []));
    }
}
