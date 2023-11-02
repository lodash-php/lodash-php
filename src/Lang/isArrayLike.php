<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use SebastianBergmann\Comparator\ComparisonFailure;
use SebastianBergmann\Comparator\Factory;

/**
 * Check if the value is an Array and that the keys are entirely numeric (integer)
 *
 * @category Lang
 *
 * @param mixed $value The value to check.
 *
 * @return  bool Returns `true` if the value is an array, else `false`.
 *
 * @example
 * <code>
 *
 * $object = [ 'a' => 1]
 * $array = [ 'a' ]
 *
 * isArrayLike($array)
 * // => true
 *
 * isArrayLike($object)
 * // => false
 *
 * </code>
 */
function isArrayLike(mixed $value): bool {
    return is_array($value) && every(array_keys($value), function ($key) {
            return is_int($key);
        });
}
