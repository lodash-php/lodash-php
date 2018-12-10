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
 * Creates a new array concatenating `array` with any additional arrays
 * and/or values.
 *
 * @category Array
 *
 * @param  array $array The array to concatenate.
 * @param  array<int, mixed> $values The values to concatenate.
 *
 * @return array Returns the new concatenated array.
 *
 * @example
 * <code>
 * $array = [1];
 * $other = concat($array, 2, [3], [[4]]);
 *
 * var_dump($other)
 * // => [1, 2, 3, [4]]
 *
 * var_dump($array)
 * // => [1]
 * </code>
 */
function concat($array, ...$values): array
{
    $check = function ($value): array {
        return \is_array($value) ? $value : [$value];
    };

    return \array_merge($check($array), ...\array_map($check, $values));
}
