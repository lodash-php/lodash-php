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
 * Gets `n` random elements at unique keys from `array` up to the
 * size of `array`.
 *
 * @category Array
 *
 * @param array $array The array to sample.
 * @param int $n The number of elements to sample.
 *
 * @return array the random elements.
 * @example
 * <code>
 * sampleSize([1, 2, 3], 2)
 * // => [3, 1]
 *
 * sampleSize([1, 2, 3], 4)
 * // => [2, 3, 1]
 * </code>
 */
function sampleSize(array $array, int $n = 1): array
{
    $result = [];
    $count = \count($array);

    foreach ((array) \array_rand($array, $n > $count ? $count : $n) as $index) {
        $result[] = $array[$index];
    }

    return $result;
}
