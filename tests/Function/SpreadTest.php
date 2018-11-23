<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\spread;

class SpreadTest extends TestCase
{
    public function testSpread()
    {
        $say = spread(function ($who, $what) {
            return $who.' says '.$what;
        });

        $this->assertSame('fred says hello', $say(['fred', 'hello']));
    }
}
