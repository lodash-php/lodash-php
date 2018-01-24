<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\pullAllBy;
use PHPUnit\Framework\TestCase;

class PullAllByTest extends TestCase
{
    public function testPullAllBy()
    {
        $array = [[ 'x' => 1 ], [ 'x' => 2 ], [ 'x' => 3 ], [ 'x' => 1 ]];
        pullAllBy($array, [[ 'x' => 1 ], [ 'x' => 3 ]], 'x');
        $this->assertSame([[ 'x' => 2 ]], $array);
    }
}
