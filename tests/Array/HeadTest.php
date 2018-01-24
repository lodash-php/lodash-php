<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\first;
use function _\head;
use PHPUnit\Framework\TestCase;

class HeadTest extends TestCase
{
    public function testHead()
    {
        $this->assertSame(1, head([1, 2, 3]));
        $this->assertSame(null, head([]));
        $this->assertSame(1, first([1, 2, 3])); // Test the alias
    }
}
