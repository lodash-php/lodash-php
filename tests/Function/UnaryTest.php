<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\map;
use function _\unary;
use PHPUnit\Framework\TestCase;

class UnaryTest extends TestCase
{
    public function testUnary()
    {
        $this->assertSame([6, 8, 10], map(['6', '8', '10'], unary('intval')));
    }
}
