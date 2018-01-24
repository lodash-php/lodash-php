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
 * Performs a deep comparison between two values to determine if they are
 * equivalent.
 *
 * **Note:** This method supports comparing arrays, booleans,
 * DateTime objects, exception objects, SPLObjectStorage, numbers,
 * strings, typed arrays, resources, DOM Nodes. objects are compared
 * by their own, not inherited, enumerable properties.
 *
 * @category Lang
 *
 * @param mixed $value The value to compare.
 * @param mixed $other The other value to compare.
 *
 * @return  bool Returns `true` if the values are equivalent, else `false`.
 *
 * @example
 * <code>
 *
 * $object = [ 'a' => 1]
 * $other = ['a' => '1']
 *
 * isEqual($object, $other)
 * // => true
 *
 * $object === $other
 * // => false
 * </code>
 */
function isEqual($value, $other): bool
{
    $factory = new Factory;
    $comparator = $factory->getComparatorFor($value, $other);

    try {
        $comparator->assertEquals($value, $other);

        return true;
    } catch (ComparisonFailure $failure) {
        return false;
    }
}
