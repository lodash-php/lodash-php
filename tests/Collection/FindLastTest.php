<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\findLast;

class FindLastTest extends TestCase
{
    public function testFindLast()
    {
        $this->assertSame(3, findLast([1, 2, 3, 4], function ($n) {
            return $n % 2 == 1;
        }));
    }
}
