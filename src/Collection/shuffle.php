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
 * Creates an array of shuffled values
 *
 * @category Array
 *
 * @param array $array The array to shuffle.
 *
 * @return array the new shuffled array.
 * @example
 * <code>
 * shuffle([1, 2, 3, 4])
 * // => [4, 1, 3, 2]
 * </code>
 */
function shuffle(array $array = []): array
{
    \shuffle($array);

    return $array;
}
