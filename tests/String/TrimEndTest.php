<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\trimEnd;

class TrimEndTest extends TestCase
{
    public function testTrimEnd()
    {
        $this->assertSame('  abc', trimEnd('  abc  '));
        $this->assertSame('-_-abc', trimEnd('-_-abc-_-', '_-'));
    }
}
