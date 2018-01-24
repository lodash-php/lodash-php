<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\zipObjectDeep;

class ZipObjectDeepTest extends TestCase
{
    public function testZipObjectDeep()
    {
        $this->assertEquals((object) ['a' => (object) ['b' => [(object) ['c' => 1], (object) ['d' => 2]]]], zipObjectDeep(['a.b[0].c', 'a.b[1].d'], [1, 2]));
    }
}
