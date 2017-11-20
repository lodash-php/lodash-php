<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\template;
use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    public function testTemplate()
    {
        $this->assertSame(null, template());
    }
}