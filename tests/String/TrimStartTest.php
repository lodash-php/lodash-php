<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\trimStart;
use PHPUnit\Framework\TestCase;

class TrimStartTest extends TestCase
{
    public function testTrimStart()
    {
        $this->assertSame('abc  ', trimStart('  abc  '));
        $this->assertSame('abc-_-', trimStart('-_-abc-_-', '_-'));
    }
}
