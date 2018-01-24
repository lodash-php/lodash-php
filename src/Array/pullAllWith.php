<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\basePullAll;

/**
 * This method is like `pullAll` except that it accepts `comparator` which
 * is invoked to compare elements of `array` to `values`. The comparator is
 * invoked with two arguments: (arrVal, othVal).
 *
 * **Note:** Unlike `differenceWith`, this method mutates `array`.
 *
 * @category Array
 *
 * @param array    $array      The array to modify.
 * @param array    $values     The values to remove.
 * @param callable $comparator The comparator invoked per element.
 *
 * @return array `array`.
 * @example
 * <code>
 * $array = [[ 'x' => 1, 'y' => 2 ], [ 'x' => 3, 'y' => 4 ], [ 'x' => 5, 'y' => 6 ]]
 *
 * pullAllWith($array, [[ 'x' => 3, 'y' => 4 ]], '_\isEqual')
 * var_dump($array)
 * // => [[ 'x' => 1, 'y' => 2 ], [ 'x' => 5, 'y' => 6 ]]
 * </code>
 */
function pullAllWith(array &$array, array $values, callable $comparator): array
{
    return basePullAll($array, $values, null, $comparator);
}
