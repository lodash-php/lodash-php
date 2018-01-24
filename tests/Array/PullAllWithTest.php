<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\pullAllWith;

class PullAllWithTest extends TestCase
{
    public function testPullAllWith()
    {
        $array = [['x' => 1, 'y' => 2], ['x' => 3, 'y' => 4], ['x' => 5, 'y' => 6]];
        pullAllWith($array, [['x' => 3, 'y' => 4]], '_\isEqual');
        $this->assertSame([['x' => 1, 'y' => 2], ['x' => 5, 'y' => 6]], $array);
    }
}
