<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\concat;

class ContactTest extends TestCase
{
    public function testChunk()
    {
        $array = [1];
        $other = concat($array, 2, [3], [[4]]);

        $this->assertSame([1, 2, 3, [4]], $other);
        $this->assertSame([1], $array); // Ensure original array doesn't get changed
    }
}
