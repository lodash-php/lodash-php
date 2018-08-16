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
 * This method is like `each` except that it iterates over elements of
 * `collection` from right to left.
 *
 * @category Collection
 *
 * @param array|iterable|object $collection The collection to iterate over.
 * @param callable              $iteratee   The function invoked per iteration.
 *
 * @return array|object Returns `collection`.
 * @example
 * <code>
 * eachRight([1, 2], function($value) { echo $value; })
 * // => Echoes `2` then `1`.
 * </code>
 */
function eachRight($collection, callable $iteratee)
{
    $values = \is_object($collection) ? \get_object_vars($collection) : $collection;

    foreach (\array_reverse($values, true) as $index => $value) {
        if (false === $iteratee($value, $index, $collection)) {
            break;
        }
    }

    return $collection;
}
