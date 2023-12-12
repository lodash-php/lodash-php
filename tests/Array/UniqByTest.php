<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\uniqBy;

class UniqByTest extends TestCase
{
    public function testUniqBy()
    {
        $this->assertSame([2.1, 1.2], uniqBy([2.1, 1.2, 2.3], 'floor'));
    }
}
