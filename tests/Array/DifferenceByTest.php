<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\differenceBy;

class DifferenceByTest extends TestCase
{
    public function testDifferenceBy()
    {
        $this->assertSame([], differenceBy([]));
        $this->assertSame([1, 2], differenceBy([1, 2], [3, 4]));
        $this->assertSame([1.2], differenceBy([2.1, 1.2], [2.3, 3.4], 'floor'));
    }
}
