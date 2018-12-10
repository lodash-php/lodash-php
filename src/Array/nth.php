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
 * Gets the element at index `n` of `array`. If `n` is negative, the nth
 * element from the end is returned.
 *
 * @category Array
 *
 * @param array $array The array to query.
 * @param int   $n     The index of the element to return.
 *
 * @return mixed Returns the nth element of `array`.
 * @example
 * <code>
 * $array = ['a', 'b', 'c', 'd']
 *
 * nth($array, 1)
 * // => 'b'
 *
 * nth($array, -2)
 * // => 'c'
 * </code>
 */
function nth(array $array, int $n)
{
    return \array_values($array)[$n < 0 ? \count($array) + $n : $n] ?? null;
}
