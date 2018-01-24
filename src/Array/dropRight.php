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
 * Creates a slice of `array` with `n` elements dropped from the end.
 * **NOTE:** This function will reorder and reset the array indices
 *
 * @category Array
 *
 * @param array $array The array to query.
 * @param int   $n     The number of elements to drop.
 *
 * @return array the slice of `array`.
 * @example
 * <code>
 * dropRight([1, 2, 3])
 * // => [1, 2]
 *
 * dropRight([1, 2, 3], 2)
 * // => [1]
 *
 * dropRight([1, 2, 3], 5)
 * // => []
 *
 * dropRight([1, 2, 3], 0)
 * // => [1, 2, 3]
 * </code>
 */
function dropRight(array $array, int $n = 1): array
{
    $count = \count($array);

    if ($n > $count) {
        $n = $count;
    }

    return \array_slice($array, 0, $count - $n);
}
