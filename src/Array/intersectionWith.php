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

/**
 * This method is like `intersection` except that it accepts `comparator`
 * which is invoked to compare elements of `arrays`. The order and references
 * of result values are determined by the first array. The comparator is
 * invoked with two arguments: (arrVal, othVal).
 *
 * @category Array
 *
 * @param array    ...$arrays
 * @param callable $comparator The comparator invoked per element.
 *
 * @return array the new array of intersecting values.
 *
 * @example
 * <code>
 * $objects = [[ 'x' => 1, 'y' => 2 ], [ 'x' => 2, 'y' => 1 ]]
 * $others = [[ 'x' => 1, 'y' => 1 ], [ 'x' => 1, 'y' => 2 ]]
 *
 * intersectionWith($objects, $others, '_::isEqual')
 * // => [[ 'x' => 1, 'y' => 2 ]]
 * </code>
 */
function intersectionWith(...$arrays /*, callable $comparator = null*/): array
{
    $copy = $arrays;
    $comparator = \array_pop($arrays);

    if (!\is_callable($comparator)) {
        $arrays = $copy;
        $comparator = null;
    }

    return baseIntersection($arrays, null, $comparator);
}
