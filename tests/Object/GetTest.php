<?php
declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2019
 */

use function _\get;
use PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
    public function testGetArray()
    {
        $actualValue1 = "data";
        $sampleArray = ["key1" => ["key2" => ["key3" => $actualValue1, "key4" => ""]]];
        $defaultValue = "default";
        $this->assertSame($actualValue1, get($sampleArray, "key1.key2.key3", "default"), "Default To method 1 failed");
        $this->assertSame($defaultValue, get($sampleArray, "key2.key2.key3", $defaultValue), "Default To method 2 failed");
        $this->assertSame($actualValue1, get($sampleArray, ["key1","key2","key3"], $defaultValue), "Default To method 3 failed");
        $this->assertSame($defaultValue, get($sampleArray, "key1.key2.key3.key4", $defaultValue), "Default To method 4 failed");
        $this->assertSame($defaultValue, get($sampleArray, "key1.key2.key3.key4", $defaultValue), "Default To method 5 failed");
        $this->assertSame($defaultValue, get($sampleArray, ["key1","key2","key3","key4"], $defaultValue), "Default To method 6 failed");
        $this->assertSame("", get($sampleArray, "key1.key2.key4", $defaultValue), "Default To method 8 failed");

        $this->assertSame($sampleArray["key1"]["key2"], _::get($sampleArray, "key1.key2", $defaultValue), "Default To method 9 failed");
        $this->assertSame($defaultValue, _::get($sampleArray, "key1.key3", $defaultValue), "Default To method 10 failed");
    }

    public function testDefaultToObject()
    {
        $actualValue1 = "data";
        $sampleArray = (object)["key1" => (object)["key2" => (object)["key3" => $actualValue1, "key4" => ""]]];
        $defaultValue = "default";
        $this->assertSame($actualValue1, get($sampleArray, "key1.key2.key3", $defaultValue), "Default To method object 1 failed");
        $this->assertSame($defaultValue, get($sampleArray, "key2.key2.key3", $defaultValue), "Default To method object 2 failed");
        $this->assertSame($actualValue1, get($sampleArray, ["key1","key2","key3"], $defaultValue), "Default To method object 3 failed");
        $this->assertSame($defaultValue, get($sampleArray, "key1.key2.key3.key4", $defaultValue), "Default To method object 4 failed");
        $this->assertSame($defaultValue, get($sampleArray, "key1.key2.key3.key4", $defaultValue), "Default To method object 5 failed");
        $this->assertSame($defaultValue, get($sampleArray, ["key1","key2","key3","key4"], $defaultValue), "Default To method object 6 failed");
        $this->assertSame("", get($sampleArray, "key1.key2.key4", $defaultValue), "Default To method object 8 failed");

        $this->assertSame($sampleArray->key1->key2, _::get($sampleArray, "key1.key2", $defaultValue), "Default To method object 9 failed");
        $this->assertSame($defaultValue, _::get($sampleArray, "key1.key3", $defaultValue), "Default To method 10 failed");
    }
}
