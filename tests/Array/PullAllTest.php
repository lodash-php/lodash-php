<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\pullAll;

class PullAllTest extends TestCase
{
    public function testPullAll()
    {
        $array = ['a', 'b', 'c', 'a', 'b', 'c'];
        pullAll($array, ['a', 'c']);
        $this->assertSame(['b', 'b'], $array);
    }
}
