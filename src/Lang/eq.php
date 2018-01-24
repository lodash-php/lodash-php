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
 * Performs a comparison between two values to determine if they are equivalent.
 *
 * @param mixed $value The value to compare.
 * @param mixed $other The other value to compare.
 *
 * @category Lang
 *
 * @return boolean Returns `true` if the values are equivalent, else `false`.
 * @example
 * <code>
 * $object = (object) ['a' => 1];
 * $other = (object) ['a' => 1];
 *
 * eq($object, $object);
 * // => true
 *
 * eq($object, $other);
 * // => false
 *
 * eq('a', 'a');
 * // => true
 *
 * eq(['a'], (object) ['a']);
 * // => false
 *
 * eq(INF, INF);
 * // => true
 * </code>
 */
function eq($value, $other): bool
{
    return $value === $other;
}
