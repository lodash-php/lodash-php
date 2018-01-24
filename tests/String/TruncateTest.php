<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\truncate;

class TruncateTest extends TestCase
{
    public function testTruncate()
    {
        $this->assertSame('hi-diddly-ho there, neighbo...', truncate('hi-diddly-ho there, neighborino'));
        $this->assertSame('hi-diddly-ho there, neighborino', truncate('hi-diddly-ho there, neighborino', ['length' => 100]));
        $this->assertSame('...', truncate('hi-diddly-ho there, neighborino', ['length' => 1]));
        $this->assertSame('hi-diddly-ho there,...', truncate('hi-diddly-ho there, neighborino', ['length' => 24, 'separator' => ' ']));
        $this->assertSame('hi-diddly-ho there...', truncate('hi-diddly-ho there, neighborino', ['length' => 24, 'separator' => '/,? +/']));
        $this->assertSame('hi-diddly-ho there, neig [...]', truncate('hi-diddly-ho there, neighborino', ['omission' => ' [...]']));
        $this->assertSame("hi-diddly-ho there,\u{e800}neighbo...", truncate("hi-diddly-ho there,\u{e800}neighborino"));
        $this->assertSame("hi-diddly-ho there, \u{e800} neigh...", truncate("hi-diddly-ho there, \u{e800} neighborino", ['separator' => '/\s?+/']));
    }
}
