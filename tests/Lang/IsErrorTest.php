<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\isError;

class IsErrorTest extends TestCase
{
    /**
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public function testIsError()
    {
        $this->assertTrue(isError(new \Exception()));
        $this->assertTrue(isError(new \InvalidArgumentException()));
        $this->assertTrue(isError(new \RuntimeException()));
        $this->assertTrue(isError(new \SoapFault("Server", '')));
        $this->assertTrue(isError(new \ParseError()));
        $this->assertTrue(isError(new \ParseError()));
        $this->assertTrue(isError(new \PDOException()));
        $this->assertTrue(isError(new \DOMException()));

        $this->assertFalse(isError('one'));
        $this->assertFalse(isError(1));
        $this->assertFalse(isError(false));
        $this->assertFalse(isError(true));
        $this->assertFalse(isError(new \stdClass()));
        $this->assertFalse(isError(\Exception::class));
    }
}
