<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseIntersection;
use function _\internal\baseIteratee;

/**
 * This method is like `intersection` except that it accepts `iteratee`
 * which is invoked for each element of each `arrays` to generate the criterion
 * by which they're compared. The order and references of result values are
 * determined by the first array. The iteratee is invoked with one argument:
 * (value).
 *
 * @category Array
 *
 * @param array<int, mixed>  ...$arrays
 * @param callable $iteratee The iteratee invoked per element.
 *
 * @return array the new array of intersecting values.
 * @example
 * <code>
 * intersectionBy([2.1, 1.2], [2.3, 3.4], Math.floor)
 * // => [2.1]
 *
 * // The `property` iteratee shorthand.
 * intersectionBy([[ 'x' => 1 ]], [[ 'x' => 2 ], [ 'x' => 1 ]], 'x');
 * // => [[ 'x' => 1 ]]
 * </code>
 */
function intersectionBy(...$arrays/*, callable $iteratee*/): array
{
    $iteratee = \array_pop($arrays);

    return baseIntersection($arrays, baseIteratee($iteratee));
}
