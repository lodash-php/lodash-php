<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\zipObject;

class ZipObjectTest extends TestCase
{
    public function testZipObject()
    {
        $this->assertEquals((object) ['a' => 1, 'b' => 2], zipObject(['a', 'b'], [1, 2]));
    }
}
