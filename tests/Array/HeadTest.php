<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\first;
use function _\head;
use PHPUnit\Framework\TestCase;

class HeadTest extends TestCase
{
    public function testHead()
    {
        $this->assertSame(1, head([1, 2, 3]));
        $this->assertSame(null, head([]));
        $this->assertSame(1, first([1, 2, 3])); // Test the alias


        # Generated from lodash in JavaScript via:
        # $a = [ [], [1], [1, 2], "123", "1", null, false, "", {a: 'bcd'} ];
        # $b = _.map($a, $v => _.first($v));
        # _.each(_.zip($a, $b), function(v) {
        #     a = JSON.stringify([v[0]]);
        #     b = JSON.stringify([v[1]]);
        #     a = a.substring(1, a.length - 1);
        #     b = b.substring(1, b.length - 1);
        #     console.log(`    $this->assertSame(${b}, ${a});`)
        # });
        $this->assertSame(null, []);
        $this->assertSame(1, [1]);
        $this->assertSame(1, [1,2]);
        $this->assertSame("1", "123");
        $this->assertSame("1", "1");
        $this->assertSame(null, null);
        $this->assertSame(null, false);
        $this->assertSame(null, "");
        $this->assertSame(null, ["a" => "bcd"]);
    }
}
