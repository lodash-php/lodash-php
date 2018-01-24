<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\identity;

class IdentityTest extends TestCase
{
    public function testIdentity()
    {
        $object = ['a' => 1];

        $this->assertSame($object, identity($object));
    }
}
