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
 * Removes elements from `array` corresponding to `indexes` and returns an
 * array of removed elements.
 *
 * **Note:** Unlike `at`, this method mutates `array`.
 *
 * @category Array
 *
 * @param array     $array   The array to modify.
 * @param int|int[] $indexes The indexes of elements to remove.
 *
 * @return array the new array of removed elements.
 * @example
 * <code>
 * $array = ['a', 'b', 'c', 'd']
 * $pulled = pullAt($array, [1, 3])
 *
 * var_dump($array)
 * // => ['a', 'c']
 *
 * var_dump($pulled)
 * // => ['b', 'd']
 * </code>
 */
function pullAt(array &$array, $indexes): array
{
    $indexes = (array) $indexes;
    $pulled = [];

    $array = \array_filter($array, function ($val, $key) use ($indexes, &$pulled) {
        $inArray = \in_array($key, $indexes);

        if ($inArray) {
            $pulled[] = $val;
        }

        return !$inArray;
    }, \ARRAY_FILTER_USE_BOTH);

    $array = \array_values($array);

    return $pulled;
}
