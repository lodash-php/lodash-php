<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\groupBy;

class GroupByTest extends TestCase
{
    public function testCountBy()
    {
        $this->assertSame(['6' => [6.1, 6.3], '4' => [4.2]], groupBy([6.1, 4.2, 6.3], 'floor'));
        $this->assertSame(['3' => ['one', 'two'], '5' => ['three']], groupBy(['one', 'two', 'three'], 'strlen'));
    }
}
