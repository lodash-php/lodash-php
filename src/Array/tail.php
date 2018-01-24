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
 * Gets all but the first element of `array`.
 *
 * @category Array
 *
 * @param array $array The array to query.
 *
 * @return array the slice of `array`.
 *
 * @example
 * <code>
 * tail([1, 2, 3])
 * // => [2, 3]
 * </code>
 */
function tail(array $array): array
{
    array_shift($array);

    return $array;
}
