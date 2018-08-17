<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseFlatten;

/**
 * This method is like `difference` except that it accepts `comparator`
 * which is invoked to compare elements of `array` to `values`. The order and
 * references of result values are determined by the first array. The comparator
 * is invoked with two arguments: (arrVal, othVal).
 *
 * **Note:** Unlike `pullAllWith`, this method returns a new array.
 *
 * @category Array
 *
 * @param array<int, mixed>    $array      The array to inspect.
 * @param array    ...$values  The values to exclude.
 * @param callable $comparator The comparator invoked per element.
 *
 * @return array Returns the new array of filtered values.
 *
 * @throws \InvalidArgumentException
 *
 * @example
 * <code>
 * $objects = [[ 'x' => 1, 'y' => 2 ], [ 'x' => 2, 'y' => 1 ]]
 *
 * differenceWith($objects, [[ 'x' => 1, 'y' => 2 ]], '_::isEqual')
 * // => [[ 'x' => 2, 'y' => 1 ]]
 * </code>
 */
function differenceWith(array $array, ...$values): array
{
    if (!$array) {
        return [];
    }

    if (!\is_callable(\end($values))) {
        return difference($array, ...$values);
    }

    /** @var callable $comparator */
    $comparator = \array_pop($values);

    $values = baseFlatten($values, 1, 'is_array', true, null);

    $valuesLength = \count($values);
    $result = [];

    foreach ($array as $value) {
        $valuesIndex = $valuesLength;
        while ($valuesIndex--) {
            if ($comparator($value, $values[$valuesIndex])) {
                continue 2;
            }
        }

        $result[] = $value;
    }

    return $result;
}
