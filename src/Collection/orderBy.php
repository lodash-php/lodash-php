<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseOrderBy;

/**
 * This method is like `sortBy` except that it allows specifying the sort
 * orders of the iteratees to sort by. If `orders` is unspecified, all values
 * are sorted in ascending order. Otherwise, specify an order of "desc" for
 * descending or "asc" for ascending sort order of corresponding values.
 *
 * @category Collection
 *
 * @param iterable|null               $collection The collection to iterate over.
 * @param array[]|callable[]|string[] $iteratee   The iteratee(s) to sort by.
 * @param string[]                    $orders     The sort orders of `iteratees`.
 *
 * @return array the new sorted array.
 * @example
 * <code>
 * $users = [
 *   ['user' => 'fred',   'age' => 48],
 *   ['user' => 'barney', 'age' => 34],
 *   ['user' => 'fred',   'age' => 40],
 *   ['user' => 'barney', 'age' => 36]
 * ]
 *
 * // Sort by `user` in ascending order and by `age` in descending order.
 * orderBy($users, ['user', 'age'], ['asc', 'desc'])
 * // => [['user' => 'barney', 'age' => 36], ['user' => 'barney', 'age' => 34], ['user' => 'fred', 'age' => 48], ['user' => 'fred', 'age' => 40]]
 * </code>
 */
function orderBy(?iterable $collection, array $iteratee, array $orders): array
{
    if (null === $collection) {
        return [];
    }

    return baseOrderBy($collection, $iteratee, $orders);
}
