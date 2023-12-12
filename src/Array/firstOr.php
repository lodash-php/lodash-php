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
 * Gets the first element of `array` or `default` if the array is empty
 *
 * @alias    firstOr
 * @param mixed $array The array to query.
 * @param mixed|callable $default Value or Callable if array is empty *
 *
 * @return mixed Returns the first element of `array` or `default` if empty.
 *
 * @category Array
 *
 * @example
 * <code>
 * head([1, 2, 3])
 * // => 1
 *
 * head([])
 * // => null
 * </code>
 */
function headOr(mixed $array, mixed $default)
{
    if ((is_array($array) || $array instanceof \ArrayObject) && count($array)) {
        return reset($array);
    }
    else if (is_string($array) && strlen($array)) {
        return substr($array, 0, 1);
    }
    return is_callable($default) ? $default($array) : $default;
}

/* alias to head() */
function firstOr(mixed $array, mixed $default)
{
    return headOr($array, $default);
}

