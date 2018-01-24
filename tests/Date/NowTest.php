<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\now;
use PHPUnit\Framework\TestCase;

class NowTest extends TestCase
{
    public function testWords()
    {
        // @TODO: This test is very volatile. Get a better way of testing a timestamp
        $this->assertSame((int) (\microtime(true) * 1000), now());
    }
}
