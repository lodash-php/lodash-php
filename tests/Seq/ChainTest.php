<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\chain;
use PHPUnit\Framework\TestCase;

class ChainTest extends TestCase
{
    public function testChain()
    {
        $users = [
            ['user' => 'barney', 'age' => 36],
            ['user' => 'fred', 'age' => 40],
            ['user' => 'pebbles', 'age' => 1],
        ];

        $youngest = chain($users)
            ->sortBy('age')
            ->map(function ($o) {
                return $o['user'] . ' is ' . $o['age'];
            })
            ->head()
            ->value();

        $this->assertSame('pebbles is 1', $youngest);
    }
}
