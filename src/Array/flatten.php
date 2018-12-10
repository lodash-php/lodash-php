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
 * Flattens `array` a single level deep.
 *
 * @category Array
 *
 * @param array $array The array to flatten.
 *
 * @return array the new flattened array.
 * @example
 * <code>
 * flatten([1, [2, [3, [4]], 5]])
 * // => [1, 2, [3, [4]], 5]
 * </code>
 */
function flatten(array $array = null): array
{
    return baseFlatten($array, 1);
}
