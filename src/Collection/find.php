<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseIteratee;

/**
 * Iterates over elements of `collection`, returning the first element
 * `predicate` returns truthy for. The predicate is invoked with three
 * arguments: (value, index|key, collection).
 *
 * @category Collection
 *
 * @param iterable $collection The collection to inspect.
 * @param callable $predicate  The function invoked per iteration.
 * @param int      $fromIndex  The index to search from.
 *
 * @return mixed Returns the matched element, else `null`.
 *
 * @example
 * <code>
 * $users = [
 *     ['user' => 'barney',  'age' => 36, 'active' => true],
 *     ['user' => 'fred',    'age' => 40, 'active' => false],
 *     ['user' => 'pebbles', 'age' => 1,  'active' => true]
 * ];
 *
 * find($users, function($o) { return $o['age'] < 40; });
 * // => object for 'barney'
 *
 * // The `matches` iteratee shorthand.
 * find($users, ['age' => 1, 'active' => true]);
 * // => object for 'pebbles'
 *
 * // The `matchesProperty` iteratee shorthand.
 * find($users, ['active', false]);
 * // => object for 'fred'
 *
 * // The `property` iteratee shorthand.
 * find($users, 'active');
 * // => object for 'barney'
 * </code>
 */
function find(iterable $collection, $predicate = null, int $fromIndex = 0)
{
    $iteratee = baseIteratee($predicate);

    foreach (\array_slice(\is_array($collection) ? $collection : \iterator_to_array($collection), $fromIndex) as $key => $value) {
        if ($iteratee($value, $key, $collection)) {
            return $value;
        }
    }

    return null;
}
