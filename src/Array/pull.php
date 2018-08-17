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
 * Removes all given values from `array` using
 * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * for equality comparisons.
 *
 * **Note:** Unlike `without`, this method mutates `array`. Use `remove`
 * to remove elements from an array by predicate.
 *
 * @category Array
 *
 * @param array $array The array to modify.
 * @param array<int, string> $values The values to remove.
 *
 * @return array
 *
 * @example
 * <code>
 * $array = ['a', 'b', 'c', 'a', 'b', 'c']
 *
 * pull($array, 'a', 'c')
 * var_dump($array)
 * // => ['b', 'b']
 * </code>
 */
function pull(array &$array, ...$values): array
{
    $array = \array_filter($array, function ($val) use ($values) {
        return !\in_array($val, $values, true);
    });

    $array = \array_values($array); // Re-index array

    return $array;
}
