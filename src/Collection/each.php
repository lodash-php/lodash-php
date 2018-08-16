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
 * Iterates over elements of `collection` and invokes `iteratee` for each element.
 * The iteratee is invoked with three arguments: (value, index|key, collection).
 * Iteratee functions may exit iteration early by explicitly returning `false`.
 *
 * **Note:** As with other "Collections" methods, objects with a "length"
 * property are iterated like arrays. To avoid this behavior use `forIn`
 * or `forOwn` for object iteration.
 *
 * @category     Collection
 *
 * @param array|iterable|object $collection The collection to iterate over.
 * @param callable              $iteratee   The function invoked per iteration.
 *
 * @return array|object Returns `collection`.
 *
 * @example
 * <code>
 * each([1, 2], function ($value) { echo $value; })
 * // => Echoes `1` then `2`.
 *
 * each((object) ['a' => 1, 'b' => 2], function ($value, $key) { echo $key; });
 * // => Echoes 'a' then 'b' (iteration order is not guaranteed).
 * </code>
 */
function each($collection, callable $iteratee)
{
    $values = \is_object($collection) ? \get_object_vars($collection) : $collection;

    /** @var array $values */
    foreach ($values as $index => $value) {
        if (false === $iteratee($value, $index, $collection)) {
            break;
        }
    }

    return $collection;
}
