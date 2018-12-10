<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\bind;

class BindTest extends TestCase
{
    public function testBind()
    {
        $object = new class {
            public $user = 'fred';

            private $age = 54;
        };

        $greet = function ($greeting, $punctuation) {
            return $greeting.' '.$this->user.$punctuation;
        };

        $bound = bind($greet, $object, 'hi');

        $this->assertSame('hi fred!', $bound('!'));

        $bound = bind(function ($prefix, $suffix) {
            return $prefix.' '.$this->age.' '.$suffix;
        }, $object, 'I\'m');

        $this->assertSame('I\'m 54 years', $bound('years'));
    }
}
