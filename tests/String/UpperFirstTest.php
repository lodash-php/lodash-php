<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\upperFirst;

class UpperFirstTest extends TestCase
{
    public function testUpperFirst()
    {
        $this->assertSame('Fred', upperFirst('fred'));
        $this->assertSame('FRED', upperFirst('FRED'));
    }
}
