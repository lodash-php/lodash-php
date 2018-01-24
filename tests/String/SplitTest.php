<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\split;

class SplitTest extends TestCase
{
    public function testSplit()
    {
        $this->assertSame(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], split('Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec', ','));
        $this->assertSame(['a', 'b'], split('a-b-c', '-', 2));
        $this->assertSame(['Harry Trump', 'Fred Barney', 'Helen Rigby', 'Bill Abel', 'Chris Hand '], split('Harry Trump ;Fred Barney; Helen Rigby ; Bill Abel ;Chris Hand ', '/\s*;\s*/'));
        $this->assertSame(['Hello', 'World.', 'How'], split('Hello World. How are you doing?', ' ', 3));
        $this->assertSame(['Hello ', '1', ' word. Sentence number ', '2', '.'], split('Hello 1 word. Sentence number 2.', '/(\d)/'));
    }
}
