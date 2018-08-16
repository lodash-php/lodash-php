<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _;

/**
 * Computes the maximum value of `array`. If `array` is empty or falsey, null is returned.
 *
 * @category Math
 *
 * @param array|null $array The array to iterate over.
 *
 * @return int|null Returns the maximum value.
 * @example
 * <code>
 * max([4, 2, 8, 6]);
 * // => 8
 *
 * max([]);
 * // => null
 * </code>
 */
function max(?array $array): ?int
{
    return $array ? \max($array) : null;
}
