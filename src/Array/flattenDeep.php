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
 * Recursively flattens `array`.
 *
 * @category Array
 *
 * @param array $array The array to flatten.
 *
 * @return array Returns the new flattened array.
 * @example
 * <code>
 * flattenDeep([1, [2, [3, [4]], 5]]);
 * // => [1, 2, 3, 4, 5]
 * </code>
 */
function flattenDeep(array $array): array
{
    return baseFlatten($array, PHP_INT_MAX);
}
