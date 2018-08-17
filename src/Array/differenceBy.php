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
 * This method is like `difference` except that it accepts `iteratee` which
 * is invoked for each element of `array` and `values` to generate the criterion
 * by which they're compared. The order and references of result values are
 * determined by the first array. The iteratee is invoked with one argument:
 * (value).
 *
 * **Note:** Unlike `pullAllBy`, this method returns a new array.
 *
 * @category Array
 *
 * @param array    $array    The array to inspect.
 * @param array<int, mixed> ...$values  The values to exclude.
 * @param callable $iteratee The iteratee invoked per element.
 *
 * @return array Returns the new array of filtered values.
 *
 * @example
 * <code>
 * differenceBy([2.1, 1.2], [2.3, 3.4], 'floor')
 * // => [1.2]
 * </code>
 */
function differenceBy(array $array, ...$values): array
{
    if (!$array) {
        return [];
    }

    if (!\is_callable(\end($values))) {
        return difference($array, ...$values);
    }

    /** @var callable $iteratee */
    $iteratee = \array_pop($values);

    $values = \array_map($iteratee, baseFlatten($values, 1, 'is_array', true, null));

    $valuesLength = \count($values);
    $result = [];

    foreach ($array as $value) {
        $computed = $iteratee($value);
        $valuesIndex = $valuesLength;
        while ($valuesIndex--) {
            if ($computed === $values[$valuesIndex]) {
                continue 2;
            }
        }

        $result[] = $value;
    }

    return $result;
}
