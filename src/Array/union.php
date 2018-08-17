<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

/**
 * Creates an array of unique values, in order, from all given arrays using
 * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * for equality comparisons.
 *
 * @category Array
 *
 * @param array ...$arrays The arrays to inspect.
 *
 * @return array the new array of combined values.
 *
 * @example
 * <code>
 * union([2], [1, 2])
 * // => [2, 1]
 * </code>
 */
function union(array ...$arrays): array
{
    return array_unique(array_merge(...$arrays));
}
