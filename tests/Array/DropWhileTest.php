<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\dropWhile;

class DropWhileTest extends TestCase
{
    public function testDropWhile()
    {
        $users = [
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => true],
            ['user' => 'pebbles', 'active' => false],
        ];

        $this->assertSame([['user' => 'pebbles', 'active' => false]], dropWhile($users, function ($user) {
            return $user['active'];
        }));
    
        $lines = [
            'Processing report:',
            'Processed: 1',
            'Successful: 1',
            '',
            '',
        ];

        $lines = dropWhile($lines, static function ($x) {
            return trim((string) $x) !== '';
        });

        self::assertEquals(['', ''], $lines);

        $lines = dropWhile($lines, static function ($x) {
            return trim((string) $x) === '';
        });

        self::assertEmpty($lines);
    }
}
