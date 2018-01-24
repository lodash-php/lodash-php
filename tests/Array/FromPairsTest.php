<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\fromPairs;

class FromPairsTest extends TestCase
{
    public function testFromPairs()
    {
        $this->assertEquals((object) ['a' => 1, 'b' => 2], fromPairs([['a', 1], ['b', 2]]));
        $this->assertEquals(new \stdClass(), fromPairs([]));
    }
}
