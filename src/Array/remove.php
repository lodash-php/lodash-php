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
 * Removes all elements from `array` that `predicate` returns truthy for
 * and returns an array of the removed elements. The predicate is invoked
 * with three arguments: (value, index, array).
 *
 * **Note:** Unlike `filter`, this method mutates `array`. Use `pull`
 * to pull elements from an array by value.
 *
 * @category Array
 *
 * @param array    $array     The array to modify.
 * @param callable $predicate The function invoked per iteration.
 *
 * @return array the new array of removed elements.
 * @example
 * <code>
 * $array = [1, 2, 3, 4]
 * $evens = remove($array, function ($n) { return $n % 2 === 0; })
 *
 * var_dump($array)
 * // => [1, 3]
 *
 * var_dump($evens)
 * // => [2, 4]
 * </code>
 */
function remove(array &$array, callable $predicate): array
{
    $resultArray = [];
    $array = \array_filter($array, function ($val, $key) use ($predicate, $array, &$resultArray) {
        $result = $predicate($val, $key, $array);

        if ($result) {
            $resultArray[] = $val;
        }

        return !$result;
    }, \ARRAY_FILTER_USE_BOTH);

    $array = \array_values($array); // Re-index array

    return $resultArray;
}
