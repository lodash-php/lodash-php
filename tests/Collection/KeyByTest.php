<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\keyBy;

class KeyByTest extends TestCase
{
    public function testKeyBy()
    {
        $array = [
            ['direction' => 'left', 'code' => 97],
            ['direction' => 'right', 'code' => 100],
        ];

        $this->assertSame(['a' => ['direction' => 'left', 'code' => 97], 'd' => ['direction' => 'right', 'code' => 100]], keyBy($array, function ($o) {
            return \chr($o['code']);
        }));
        $this->assertSame(['left' => ['direction' => 'left', 'code' => 97], 'right' => ['direction' => 'right', 'code' => 100]], keyBy($array, 'direction'));
    }
}
