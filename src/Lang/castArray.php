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
 * Casts `value` as an array if it's not one.
 *
 * @param mixed $value The value to cast
 *
 * @returns {Array} Returns the cast array.
 * @param  array $array The array to concatenate.
 *
 * @return array Returns the cast array.
 *
 * @example
 *
 * _.castArray(1);
 * // => [1]
 *
 * _.castArray({ 'a': 1 });
 * // => [{ 'a': 1 }]
 *
 * _.castArray('abc');
 * // => ['abc']
 *
 * _.castArray(null);
 * // => [null]
 *
 * _.castArray(undefined);
 * // => [undefined]
 *
 * _.castArray();
 * // => []
 *
 * var array = [1, 2, 3];
 * console.log(_.castArray(array) === array);
 * // => true
 */
function castArray($value): array
{
    $check = function ($value): array {
        return \is_array($value) ? $value : [$value];
    };

    return $check($value);
}
