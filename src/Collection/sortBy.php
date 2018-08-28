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
 * Creates an array of elements, sorted in ascending order by the results of
 * running each element in a collection through each iteratee. This method
 * performs a stable sort, that is, it preserves the original sort order of
 * equal elements. The iteratees are invoked with one argument: (value).
 *
 * @category Collection
 *
 * @param array|object|null   $collection The collection to iterate over.
 * @param callable|callable[] $iteratees  The iteratees to sort by.
 *
 * @return array Returns the new sorted array.
 * @example
 * <code>
 * $users = [
 *   [ 'user' => 'fred',   'age' => 48 ],
 *   [ 'user' => 'barney', 'age' => 36 ],
 *   [ 'user' => 'fred',   'age' => 40 ],
 *   [ 'user' => 'barney', 'age' => 34 ],
 * ];
 *
 * sortBy($users, [function($o) { return $o['user']; }]);
 * // => [['user' => 'barney', 'age' => 36], ['user' => 'barney', 'age' => 34], ['user' => 'fred', 'age' => 48], ['user' => 'fred', 'age' => 40]]
 *
 * sortBy($users, ['user', 'age']);
 * // => [['user' => 'barney', 'age' => 34], ['user' => 'barney', 'age' => 36], ['user' => 'fred', 'age' => 40], ['user' => 'fred', 'age' => 48]]
 * </code>
 */
function sortBy($collection, $iteratees): array
{
    if (null === $collection) {
        return [];
    };

    if (\is_callable($iteratees) || !\is_iterable($iteratees)) {
        $iteratees = [$iteratees];
    }

    /*$length = \count($iteratees);
    if ($length > 1 && isIterateeCall($collection, $iteratees[0], $iteratees[1])) {
        $iteratees = [];
    } else if ($length > 2 && isIterateeCall($iteratees[0], $iteratees[1], $iteratees[2])) {
        $iteratees = [$iteratees[0]];
    }*/

    $result = \is_object($collection) ? \get_object_vars($collection) : $collection;

    foreach ($iteratees as $callable) {
        usort($result, function ($a, $b) use ($callable) {
            $iteratee = baseIteratee($callable);

            return $iteratee($a, $b) <=> $iteratee($b, $a);
        });
    }

    return $result;
}
