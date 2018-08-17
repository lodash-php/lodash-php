<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\pick;

class PickTest extends TestCase
{
    public function testPick()
    {
        $object = (object) ['a' => 1, 'b' => '2', 'c' => 3];
        $this->assertEquals((object) ['a' => 1, 'c' => 3], pick($object, ['a', 'c']));

        $this->assertEquals((object) ['a' => 1], pick($object, 'a'));
    }
}
