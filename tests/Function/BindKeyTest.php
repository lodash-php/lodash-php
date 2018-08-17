<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\bindKey;

class BindKeyTest extends TestCase
{
    public function testBindKey()
    {
        $object = new class {
            private $user = 'fred';

            public function greet($greeting, $punctuation)
            {
                return $greeting.' '.$this->user.$punctuation;
            }
        };

        $bound = bindKey($object, 'greet', 'hi');

        $this->assertSame('hi fred!', $bound('!'));
    }
}
