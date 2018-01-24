<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\remove;

class RemoveTest extends TestCase
{
    public function testRemove()
    {
        $array = [1, 2, 3, 4];
        $evens = remove($array, function ($n) {
            return $n % 2 === 0;
        });
        $this->assertSame([1, 3], $array);
        $this->assertSame([2, 4], $evens);
    }
}
