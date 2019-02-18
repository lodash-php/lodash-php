<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\flatten;
use PHPUnit\Framework\TestCase;

class FlattenTest extends TestCase
{
    public function testFlatten()
    {
        $this->assertSame([1, 2, [3, [4]], 5], flatten([1, [2, [3, [4]], 5]]));

        $this->assertSame([1, 2, 3, 4, 5, 6], flatten([[1, 2, 3], [], [4, 5, 6]]));
    }
}
