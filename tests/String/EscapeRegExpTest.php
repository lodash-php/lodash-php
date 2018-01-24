<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\escapeRegExp;
use PHPUnit\Framework\TestCase;

class EscapeRegExpTest extends TestCase
{
    public function testEscapeRegExp()
    {
        $this->assertSame('\[lodash\]\(https://lodash\.com/\)', escapeRegExp('[lodash](https://lodash.com/)'));
    }
}
