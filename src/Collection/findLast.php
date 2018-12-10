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
 * This method is like `find` except that it iterates over elements of
 * `collection` from right to left.
 *
 * @category Collection
 *
 * @param iterable $collection The collection to inspect.
 * @param callable $predicate  The function invoked per iteration.
 * @param int      $fromIndex  The index to search from.
 *
 * @return mixed Returns the matched element, else `undefined`.
 *
 * @example
 * <code>
 * findLast([1, 2, 3, 4], function ($n) { return $n % 2 == 1; })
 * // => 3
 * </code>
 */
function findLast(iterable $collection, $predicate = null, int $fromIndex = 0)
{
    $iteratee = baseIteratee($predicate);

    foreach (\array_slice(\array_reverse(\is_array($collection) ? $collection : \iterator_to_array($collection), true), $fromIndex) as $key => $value) {
        if ($iteratee($value, $key, $collection)) {
            return $value;
        }
    }

    return null;
}
