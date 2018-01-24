<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\uniq;
use PHPUnit\Framework\TestCase;

class UniqTest extends TestCase
{
    public function testUniq()
    {
        $this->assertSame([2, 1], uniq([2, 1, 2]));
    }
}
