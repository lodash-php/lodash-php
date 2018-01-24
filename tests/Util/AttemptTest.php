<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\attempt;
use function _\isError;

class AttemptTest extends TestCase
{
    /**
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public function testAttempt()
    {
        $this->assertTrue(isError(attempt(function () {
            return new \PDO(null);
        })));

        $this->assertFalse(isError(attempt(function () {
            return 'one';
        })));
    }
}
