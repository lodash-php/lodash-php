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
 * Gets a random element from `array`.
 *
 * @category Array
 *
 * @param array $array The array to sample.
 *
 * @return mixed Returns the random element.
 *
 * @example
 * <code>
 * sample([1, 2, 3, 4])
 * // => 2
 * </code>
 */
function sample(array $array)
{
    /** @var string|int $key */
    $key = \array_rand($array, 1);

    return $array[$key];
}
