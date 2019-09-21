<?php
declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2019
 */

use function _\defaultTo;
use PHPUnit\Framework\TestCase;

class DefaultToTest extends TestCase
{
    public function testDefaultTo()
    {
        $null = null;
        $default = "defaultValue";
        $realValue = "string";
        $this->assertSame($default, defaultTo($null, $default), "DefaultTo 1 failed");
        $this->assertSame($default, defaultTo(NAN, $default), "DefaultTo 2 failed");
        $this->assertSame($realValue, defaultTo($realValue, $default), "DefaultTo 3 failed");
        $this->assertSame("", defaultTo("", $default), "DefaultTo 4 failed");
    }
}
