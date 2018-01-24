<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\capitalize;

class CapitalizeTest extends TestCase
{
    public function testWords()
    {
        $this->assertSame('Fred', capitalize('FRED'));
    }
}
