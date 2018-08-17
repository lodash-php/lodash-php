<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\ary;
use function _\map;
use PHPUnit\Framework\TestCase;

class AryTest extends TestCase
{
    public function testAry()
    {
        $this->assertSame([6, 8, 10], map(['6', '8', '10'], ary('intval', 1)));
    }
}
