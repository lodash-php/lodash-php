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
 * Iterates over elements of `array`, returning an array of all elements
 * `predicate` returns truthy for. The predicate is invoked with three
 * arguments: (value, index, array).
 *
 * **Note:** Unlike `remove`, this method returns a new array.
 *
 * @category Collection
 *
 * @param iterable $array     The array to iterate over.
 * @param callable $predicate The function invoked per iteration.
 *
 * @return array the new filtered array.
 *
 * @example
 * <code>
 * $users = [
 *     [ 'user' => 'barney', 'age' => 36, 'active' => true],
 *     [ 'user' => 'fred',   'age' => 40, 'active' => false]
 * ];
 *
 * filter($users, function($o) { return !$o['active']; });
 * // => objects for ['fred']
 *
 * // The `matches` iteratee shorthand.
 * filter($users, ['age' => 36, 'active' => true]);
 * // => objects for ['barney']
 *
 * // The `matchesProperty` iteratee shorthand.
 * filter($users, ['active', false]);
 * // => objects for ['fred']
 *
 * // The `property` iteratee shorthand.
 * filter($users, 'active');
 * // => objects for ['barney']
 * </code>
 */
function filter(iterable $array, $predicate = null): array
{
    $iteratee = baseIteratee($predicate);

    $result = \array_filter(
        \is_array($array) ? $array : \iterator_to_array($array),
        function ($value, $key) use ($array, $iteratee) {
            return $iteratee($value, $key, $array);
        },
        \ARRAY_FILTER_USE_BOTH
    );

    return \array_values($result);
}
