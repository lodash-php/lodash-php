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
 * Gets the last element of `array`.
 *
 * @category Array
 *
 * @param array $array The array to query.
 *
 * @return mixed Returns the last element of `array`.
 * @example
 * <code>
 * last([1, 2, 3])
 * // => 3
 * </code>
 */
function last(array $array)
{
    return \end($array) ?: null;
}
