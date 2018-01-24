<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\zipObject;
use PHPUnit\Framework\TestCase;

class ZipObjectTest extends TestCase
{
    public function testZipObject()
    {
        $this->assertEquals((object) ['a' => 1, 'b' => 2], zipObject(['a', 'b'], [1, 2]));
    }
}
