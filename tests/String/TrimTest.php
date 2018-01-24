<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\trim;

class TrimTest extends TestCase
{
    public function testTrim()
    {
        $this->assertSame('abc', trim('  abc  '));
        $this->assertSame('abc', trim('-_-abc-_-', '_-'));
    }
}
