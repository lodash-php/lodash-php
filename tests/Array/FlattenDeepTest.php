<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\flattenDeep;

class FlattenDeepTest extends TestCase
{
    public function testFlattenDeep()
    {
        $this->assertSame([1, 2, 3, 4, 5], flattenDeep([1, [2, [3, [4]], 5]]));
    }
}
