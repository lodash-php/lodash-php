<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\flip;

class FlipTest extends TestCase
{
    public function testFlip()
    {
        $flipped = flip(function () {
            return func_get_args();
        });

        $this->assertSame(['d', 'c', 'b', 'a'], $flipped('a', 'b', 'c', 'd'));
    }
}
