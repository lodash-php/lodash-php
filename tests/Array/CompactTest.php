<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\compact;

class CompactTest extends TestCase
{
    public function testChunk()
    {
        $this->assertSame([1, 2, 3], compact([0, 1, false, 2, '', 3]));
        $this->assertSame([], compact([]));
        $this->assertSame([], compact(null));
    }
}
