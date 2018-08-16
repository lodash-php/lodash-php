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
 * Checks if `predicate` returns truthy for **all** elements of `array`.
 * Iteration is stopped once `predicate` returns falsey. The predicate is
 * invoked with three arguments: (value, index, array).
 *
 * **Note:** This method returns `true` for
 * [empty arrays](https://en.wikipedia.org/wiki/Empty_set) because
 * [everything is true](https://en.wikipedia.org/wiki/Vacuous_truth) of
 * elements of empty arrays.
 *
 * @category Array
 *
 * @param iterable $collection The array to iterate over.
 * @param callable $predicate  The function invoked per iteration.
 *
 * @return bool `true` if all elements pass the predicate check, else `false`.
 * @example
 * <code>
 * every([true, 1, null, 'yes'], function ($value) { return is_bool($value);})
 * // => false
 *
 * $users = [
 *     ['user' => 'barney', 'age' => 36, 'active' => false],
 *     ['user' => 'fred', 'age' => 40, 'active' => false],
 * ];
 *
 * // The `matches` iteratee shorthand.
 * $this->assertFalse(every($users, ['user' => 'barney', 'active' => false]));
 * // false
 *
 * // The `matchesProperty` iteratee shorthand.
 * $this->assertTrue(every($users, ['active', false]));
 * // true
 *
 * // The `property` iteratee shorthand.
 * $this->assertFalse(every($users, 'active'));
 * //false
 *
 * </code>
 */
function every(iterable $collection, $predicate): bool
{
    $iteratee = baseIteratee($predicate);

    foreach ($collection as $key => $value) {
        if (!$iteratee($value, $key, $collection)) {
            return false;
        }
    }

    return true;
}
