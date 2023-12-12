<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\size;

class SizeTest extends TestCase
{
    public function testSize()
    {
        $this->assertSame(3, size([1, 2, 3]));
        $this->assertSame(2, size(new class {
            public $a = 1;

            public $b = 2;

            private $c = 3;
        }));

        $this->assertSame(12, size(new class implements \Countable {
            #[\ReturnTypeWillChange]
            public function count()
            {
                return 12;
            }
        }));

        $this->assertSame(4, size(new \ArrayIterator([1, 2, 3, 4])));

        $this->assertSame(7, size('pebbles'));
    }
}
