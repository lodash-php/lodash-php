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
 * Gets the first element of `array`.
 *
 * @alias    first
 * @category Array
 *
 * @param array $array The array to query.
 *
 * @return mixed Returns the first element of `array`.
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
function head(array $array)
{
    reset($array);

    return current($array) ?: null;
}

/* alias to head() */
function first(array $array)
{
    return head($array);
}
