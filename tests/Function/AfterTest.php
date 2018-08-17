<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\after;
use PHPUnit\Framework\TestCase;

class AfterTest extends TestCase
{
    public function testAfter()
    {
        $counter = 0;

        $after = after(12, function () use (&$counter) {
            $counter++;

            return $counter;
        });

        for ($i = 0; $i < 12; $i++) {
            $after();
        }

        $this->assertSame(1, $counter);
    }

    public function testAfterNotCalled()
    {
        $counter = 0;

        $after = after(12, function () use (&$counter) {
            $counter++;

            return $counter;
        });

        for ($i = 0; $i < 10; $i++) {
            $after();
        }

        $this->assertSame(0, $counter);
    }
}
