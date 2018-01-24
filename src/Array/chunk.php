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
 * Creates an array of elements split into groups the length of `size`.
 * If `array` can't be split evenly, the final chunk will be the remaining
 * elements.
 *
 * @category Array
 *
 * @param array $array  array The array to process.
 * @param int   $number [size=1] The length of each chunk
 *
 * @return array Returns the new array of chunks.
 * @example
 * <code>
 * chunk(['a', 'b', 'c', 'd'], 2)
 * // => [['a', 'b'], ['c', 'd']]
 *
 * chunk(['a', 'b', 'c', 'd'], 3)
 * // => [['a', 'b', 'c'], ['d']]
 * </code>
 */
function chunk(?array $array, int $number): array
{
    if ($number < 1) {
        return [];
    }

    return \array_chunk($array ?? [], $number, false);
}
