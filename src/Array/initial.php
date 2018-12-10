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
 * Gets all but the last element of `array`.
 *
 * @category Array
 *
 * @param array $array The array to query.
 *
 * @return array the slice of `array`.
 * @example
 * <code>
 * initial([1, 2, 3])
 * // => [1, 2]
 * </code>
 */
function initial(array $array): array
{
    \array_pop($array);
    return $array;
}
