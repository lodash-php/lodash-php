<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseRest;

/**
 * Creates an array excluding all given values using
 * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * for equality comparisons.
 *
 * **Note:** Unlike `pull`, this method returns a new array.
 *
 * @category Array
 *
 * @param array $array The array to inspect.
 * @param array<int, mixed> $values The values to exclude.
 *
 * @return array the new array of filtered values.
 * @example
 * <code>
 * without([2, 1, 2, 3], 1, 2)
 * // => [3]
 * </code>
 */
function without(array $array, ...$values): array
{
    return baseRest('\_\difference')($array, ...$values);
}
