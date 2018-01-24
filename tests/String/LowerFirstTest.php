<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\lowerFirst;

class LowerFirstTest extends TestCase
{
    public function testLowerFirst()
    {
        $this->assertSame('fred', lowerFirst('Fred'));
        $this->assertSame('fRED', lowerFirst('FRED'));
    }
}
