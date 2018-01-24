<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _;

use function _\internal\createMathOperation;

/**
 * Adds two numbers.
 *
 * @category Math
 *
 * @param int|float|string $augend The first number in an addition.
 * @param int|float|string $addend The second number in an addition.
 *
 * @return int|float Returns the total.
 *
 * @example
 * <code>
 * add(6, 4);
 * // => 10
 * </code>
 */
function add($augend, $addend)
{
    return createMathOperation(function ($augend, $addend) {
        return $augend + $addend;
    }, 0)($augend, $addend);
}
