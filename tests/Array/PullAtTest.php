<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\pullAt;

class PullAtTest extends TestCase
{
    public function testPullAt()
    {
        $array = ['a', 'b', 'c', 'd'];
        $pulled = pullAt($array, [1, 3]);
        $this->assertSame(['a', 'c'], $array);
        $this->assertSame(['b', 'd'], $pulled);
    }
}
