<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\countBy;
use PHPUnit\Framework\TestCase;

class CountByTest extends TestCase
{
    public function testCountBy()
    {
        $this->assertSame(['6' => 2, '4' => 1], countBy([6.1, 4.2, 6.3], 'floor'));
        $this->assertSame(['3' => 2, '5' => 1], countBy(['one', 'two', 'three'], 'strlen'));
    }
}
