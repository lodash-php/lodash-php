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
 * Checks if `predicate` returns truthy for **any** element of `collection`.
 * Iteration is stopped once `predicate` returns truthy. The predicate is
 * invoked with three arguments: (value, index|key, collection).
 *
 * @category Collection
 *
 * @param iterable              $collection The collection to iterate over.
 * @param callable|string|array $predicate  The function invoked per iteration.
 *
 * @return boolean Returns `true` if any element passes the predicate check, else `false`.
 * @example
 * <code>
 * some([null, 0, 'yes', false], , function ($value) { return \is_bool($value); }));
 * // => true
 *
 * $users = [
 *   ['user' => 'barney', 'active' => true],
 *   ['user' => 'fred',   'active' => false]
 * ];
 *
 * // The `matches` iteratee shorthand.
 * some($users, ['user' => 'barney', 'active' => false ]);
 * // => false
 *
 * // The `matchesProperty` iteratee shorthand.
 * some($users, ['active', false]);
 * // => true
 *
 * // The `property` iteratee shorthand.
 * some($users, 'active');
 * // => true
 * </code>
 */
function some(iterable $collection, $predicate = null): bool
{
    $iteratee = baseIteratee($predicate);

    foreach ($collection as $key => $value) {
        if ($iteratee($value, $key, $collection)) {
            return true;
        }
    }

    return false;
}
