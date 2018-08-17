<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\once;

class OnceTest extends TestCase
{
    public function testOnce()
    {
        $counter = 0;

        $func = once(function () use (&$counter) {
            $counter++;
        });

        $func();
        $func();

        $this->assertSame(1, $counter);
    }
}
