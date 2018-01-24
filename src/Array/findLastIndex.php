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
 * This method is like `findIndex` except that it iterates over elements
 * of `collection` from right to left.
 *
 * @category Array
 *
 * @param array $array     The array to inspect.
 * @param mixed $predicate The function invoked per iteration.
 * @param int   $fromIndex The index to search from.
 *
 * @return int the index of the found element, else `-1`.
 * @example
 * <code>
 * $users = [
 *   ['user' => 'barney',  'active' => true ],
 *   ['user' => 'fred',    'active' => false ],
 *   ['user' => 'pebbles', 'active' => false ]
 * ]
 *
 * findLastIndex($users, function($user) { return $user['user'] === 'pebbles'; })
 * // => 2
 * </code>
 */
function findLastIndex(array $array, $predicate, int $fromIndex = null): int
{
    $length = \count($array);
    $index = $fromIndex ?? $length - 1;

    if ($index < 0) {
        $index = \max($length + $index, 0);
    }

    $iteratee = baseIteratee($predicate);
    foreach (\array_reverse($array, true) as $key => $value) {
        if ($iteratee($value, $key, $array)) {
            return $index;
        }

        $index--;
    }

    return -1;
}
