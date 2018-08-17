<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\maxBy;

class MaxByTest extends TestCase
{
    public function testMax()
    {
        $objects = [['n' => 1], ['n' => 2]];
        $this->assertSame(['n' => 2], maxBy($objects, function ($o) {
            return $o['n'];
        }));
        $this->assertSame(['n' => 2], maxBy($objects, 'n'));
    }
}
