<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\snakeCase;

class SnakeCaseTest extends TestCase
{
    public function testSnakeCase()
    {
        $this->assertSame('foo_bar', snakeCase('Foo Bar'));
        $this->assertSame('foo_bar', snakeCase('fooBar'));
        $this->assertSame('foo_bar', snakeCase('--FOO-BAR--'));
    }
}
