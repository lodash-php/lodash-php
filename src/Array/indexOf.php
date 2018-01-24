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
 * Gets the index at which the first occurrence of `value` is found in `array`
 * using [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * for equality comparisons. If `fromIndex` is negative, it's used as the
 * offset from the end of `array`.
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
 * indexOf([1, 2, 1, 2], 2)
 * // => 1
 *
 * // Search from the `fromIndex`.
 * indexOf([1, 2, 1, 2], 2, 2)
 * // => 3
 * </code>
 */
function indexOf(array $array, $value, int $fromIndex = null): int
{
    $inc = true;
    $index = 0;

    if (null !== $fromIndex) {
        $index = $fromIndex >= 0 ? $fromIndex : \count($array) - 1;
        if ($fromIndex < 0) {
            $array = \array_reverse($array, false);
            $inc = false;
        }
    };

    foreach ($array as $v) {
        if (isEqual($value, $v)) {
            return $index;
        }

        $inc ? $index++ : $index--;
    }

    return -1;
}
