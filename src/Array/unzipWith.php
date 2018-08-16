<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\arrayMap;

/**
 * This method is like `unzip` except that it accepts `iteratee` to specify
 * how regrouped values should be combined. The iteratee is invoked with the
 * elements of each group: (...group).
 *
 * @category Array
 *
 * @param array         $array    The array of grouped elements to process.
 * @param callable|null $iteratee The function to combine regrouped values.
 *
 * @return array the new array of regrouped elements.
 *
 * @example
 * <code>
 * $zipped = zip([1, 2], [10, 20], [100, 200])
 * // => [[1, 10, 100], [2, 20, 200]]
 *
 * unzipWith(zipped, '_::add')
 * // => [3, 30, 300]
 * </code>
 */
function unzipWith(array $array, ?callable $iteratee = null): array
{
    if (!\count($array)) {
        return [];
    }

    $result = unzip($array);
    if (!is_callable($iteratee)) {
        return $result;
    }

    return arrayMap($result, function ($group) use ($iteratee) {
        return $iteratee(...$group);
    });
}
