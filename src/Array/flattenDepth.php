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
 * Recursively flatten `array` up to `depth` times.
 *
 * @category Array
 *
 * @param array $array The array to flatten.
 * @param int   $depth The maximum recursion depth.
 *
 * @return array the new flattened array.
 * @example
 * <code>
 * $array = [1, [2, [3, [4]], 5]]
 *
 * flattenDepth($array, 1)
 * // => [1, 2, [3, [4]], 5]
 *
 * flattenDepth($array, 2)
 * // => [1, 2, 3, [4], 5]
 * </code>
 */
function flattenDepth(array $array, int $depth = 1): array
{
    return baseFlatten($array, $depth);
}
