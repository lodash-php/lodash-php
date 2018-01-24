<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\zip;

class ZipTest extends TestCase
{
    public function testZip()
    {
        $this->assertSame([['a', 1, true], ['b', 2, false]], zip(['a', 'b'], [1, 2], [true, false]));
    }
}
