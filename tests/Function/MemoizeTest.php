<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\memoize;

class MemoizeTest extends TestCase
{
    public function testMemoize()
    {
        $object = (object) ['a' => 1, 'b' => 2];
        $other = (object) ['c' => 3, 'd' => 4];

        $values = memoize('get_object_vars');
        $this->assertSame(['a' => 1, 'b' => 2], $values($object));
        $this->assertSame(['c' => 3, 'd' => 4], $values($other));

        $object->a = 2;

        $this->assertSame(['a' => 1, 'b' => 2], $values($object));

        // Modify the result cache.
        $values->cache->set($object, ['a', 'b']);
        $this->assertSame(['a', 'b'], $values($object));
    }
}
