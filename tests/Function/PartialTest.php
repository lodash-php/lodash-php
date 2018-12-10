<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\partial;

class PartialTest extends TestCase
{
    public function testPartial()
    {
        $greet = function ($greeting, $name) {
            return $greeting.' '.$name;
        };

        $sayHelloTo = partial($greet, 'hello');
        $this->assertSame('hello fred', $sayHelloTo('fred'));
    }
}
