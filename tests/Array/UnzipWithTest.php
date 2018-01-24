<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\unzipWith;
use PHPUnit\Framework\TestCase;

class UnzipWithTest extends TestCase
{
    public function testUnzipWith()
    {
        $zipped = [[1, 10, 100], [2, 20, 200]];
        $this->assertSame([3, 30, 300], unzipWith($zipped, '_::add'));
    }
}
