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
 * This method is like `indexOf` except that it iterates over elements of
 * `array` from right to left.
 *
 * @category Array
 *
 * @param array $array     The array to inspect.
 * @param mixed $value     The value to search for.
 * @param int   $fromIndex The index to search from.
 *
 * @return int the index of the matched value, else `-1`.
 * @example
 * <code>
 * lastIndexOf([1, 2, 1, 2], 2)
 * // => 3
 *
 * // Search from the `fromIndex`.
 * lastIndexOf([1, 2, 1, 2], 2, 2)
 * // => 1
 * </code>
 */
function lastIndexOf(array $array, $value, int $fromIndex = null): int
{
    $index = \count($array) - 1;

    if (null !== $fromIndex) {
        $index = $fromIndex > 0 ? $fromIndex : \count($array) - 1;
        $array = \array_slice($array, 0, -$fromIndex + 1);
    };

    foreach (\array_reverse($array, false) as $v) {
        if (isEqual($value, $v)) {
            return $index;
        }

        $index--;
    }

    return -1;
}
