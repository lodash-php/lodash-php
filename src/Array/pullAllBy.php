<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseIteratee;
use function _\internal\basePullAll;

/**
 * This method is like `pullAll` except that it accepts `iteratee` which is
 * invoked for each element of `array` and `values` to generate the criterion
 * by which they're compared. The iteratee is invoked with one argument: (value).
 *
 * **Note:** Unlike `differenceBy`, this method mutates `array`.
 *
 * @category Array
 *
 * @param array    $array    The array to modify.
 * @param array    $values   The values to remove.
 * @param callable $iteratee The iteratee invoked per element.
 *
 * @return array `array`.
 * @example
 * <code>
 * $array = [[ 'x' => 1 ], [ 'x' => 2 ], [ 'x' => 3 ], [ 'x' => 1 ]]
 *
 * pullAllBy($array, [[ 'x' => 1 ], [ 'x' => 3 ]], 'x')
 * var_dump($array)
 * // => [[ 'x' => 2 ]]
 * </code>
 */
function pullAllBy(array &$array, array $values, $iteratee): array
{
    return basePullAll($array, $values, baseIteratee($iteratee));
}
