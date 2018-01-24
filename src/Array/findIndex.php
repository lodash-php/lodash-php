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
 * This method is like `find` except that it returns the index of the first element predicate returns truthy for instead of the element itself.
 *
 * @category Array
 *
 * @param array    $array     The array to inspect.
 * @param callable $predicate The function invoked per iteration.
 * @param int      $fromIndex The index to search from.
 *
 * @return int the index of the found element, else `-1`.
 * @example
 * <code>
 * $users = [
 *     ['user' => 'barney',  'active' => false],
 *     ['user' => 'fred',    'active' => false],
 *     ['user' => 'pebbles', 'active' => true],
 * ];
 *
 * findIndex($users, function($o) { return $o['user'] s== 'barney'; });
 * // => 0
 *
 * // The `matches` iteratee shorthand.
 * findIndex($users, ['user' => 'fred', 'active' => false]);
 * // => 1
 *
 * // The `matchesProperty` iteratee shorthand.
 * findIndex($users, ['active', false]);
 * // => 0
 *
 * // The `property` iteratee shorthand.
 * findIndex($users, 'active');
 * // => 2
 * </code>
 */
function findIndex(array $array, $predicate, int $fromIndex = null): int
{
    $length = \count($array);
    if (!$length) {
        return -1;
    }

    $index = $fromIndex ?? 0;
    if ($index < 0) {
        $index = \min($length + $index, 0);
    }

    $iteratee = baseIteratee($predicate);

    foreach ($array as $key => $value) {
        if ($iteratee($value, $key, $array)) {
            return $index;
        }

        $index++;
    }

    return -1;
}
