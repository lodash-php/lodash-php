<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\before;
use function _\map;
use function _\uniqBy;
use PHPUnit\Framework\TestCase;

class BeforeTest extends TestCase
{
    public function testBefore()
    {
        $counter = 0;
        $func = before(5, function () use (&$counter) {
            $counter++;

            return $counter;
        });

        for ($i = 0; $i < 20; $i++) {
            $func();
        }

        $this->assertSame(4, $counter);
        $this->assertSame(4, $func());
    }

    public function testBeforeMap()
    {
        $users = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $result = uniqBy(map($users, before(5, function (int $id) {
            return [
                'id' => $id
            ];
        })), 'id');

        $this->assertSame([['id' => 1],['id' => 2],['id' => 3],['id' => 4]], $result);
    }
}
