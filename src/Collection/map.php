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
 * Creates an array of values by running each element in `collection` through
 * `iteratee`. The iteratee is invoked with three arguments:
 * (value, index|key, collection).
 *
 * Many lodash-php methods are guarded to work as iteratees for methods like
 * `_::every`, `_::filter`, `_::map`, `_::mapValues`, `_::reject`, and `_::some`.
 *
 * The guarded methods are:
 * `ary`, `chunk`, `curry`, `curryRight`, `drop`, `dropRight`, `every`,
 * `fill`, `invert`, `parseInt`, `random`, `range`, `rangeRight`, `repeat`,
 * `sampleSize`, `slice`, `some`, `sortBy`, `split`, `take`, `takeRight`,
 * `template`, `trim`, `trimEnd`, `trimStart`, and `words`
 *
 * @category Collection
 *
 * @param array|object          $collection The collection to iterate over.
 * @param callable|string|array $iteratee   The function invoked per iteration.
 *
 * @return array Returns the new mapped array.
 * @example
 * <code>
 * function square(int $n) {
 *   return $n * $n;
 * }
 *
 * map([4, 8], $square);
 * // => [16, 64]
 *
 * map((object) ['a' => 4, 'b' => 8], $square);
 * // => [16, 64] (iteration order is not guaranteed)
 *
 * $users = [
 *   [ 'user' => 'barney' ],
 *   [ 'user' => 'fred' ]
 * ];
 *
 * // The `property` iteratee shorthand.
 * map($users, 'user');
 * // => ['barney', 'fred']
 * </code>
 */
function map($collection, $iteratee): array
{
    $values = [];

    if (\is_array($collection)) {
        $values = $collection;
    } elseif ($collection instanceof \Traversable) {
        $values = \iterator_to_array($collection);
    } elseif (\is_object($collection)) {
        $values = \get_object_vars($collection);
    }

    $callable = baseIteratee($iteratee);

    return \array_map(function ($value, $index) use ($callable, $collection) {
        return $callable($value, $index, $collection);
    }, $values, \array_keys($values));
}
