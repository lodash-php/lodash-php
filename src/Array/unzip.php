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
use function _\internal\baseProperty;
use function _\internal\baseTimes;

/**
 * This method is like `zip` except that it accepts an array of grouped
 * elements and creates an array regrouping the elements to their pre-zip
 * configuration.
 *
 * @category Array
 *
 * @param array $array The array of grouped elements to process.
 *
 * @return array the new array of regrouped elements.
 * @example
 * <code>
 * $zipped = zip(['a', 'b'], [1, 2], [true, false])
 * // => [['a', 1, true], ['b', 2, false]]
 *
 * unzip($zipped)
 * // => [['a', 'b'], [1, 2], [true, false]]
 * </code>
 */
function unzip(array $array): array
{
    if (!\count($array)) {
        return [];
    }

    $length = 0;
    $array = \array_filter($array, function ($group) use (&$length) {
        if (\is_array($group)) {
            $length = \max(\count($group), $length);

            return true;
        }
    });

    return baseTimes($length, function ($index) use ($array) {
        return arrayMap($array, baseProperty($index));
    });
}
