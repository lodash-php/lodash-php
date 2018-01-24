<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\unzip;

class UnzipTest extends TestCase
{
    public function testUnzip()
    {
        $zipped = [['a', 1, true], ['b', 2, false]];
        $this->assertSame([['a', 'b'], [1, 2], [true, false]], unzip($zipped));
    }
}
