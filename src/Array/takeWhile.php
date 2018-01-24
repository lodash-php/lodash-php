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
 * Creates a slice of `array` with elements taken from the beginning. Elements
 * are taken until `predicate` returns falsey. The predicate is invoked with
 * three arguments: (value, index, array).
 *
 * @category Array
 *
 * @param array $array     The array to query.
 * @param mixed $predicate The function invoked per iteration.
 *
 * @return array the slice of `array`.
 *
 * @example
 * <code>
 * $users = [
 *   [ 'user' => 'barney',  'active' => true ],
 *   [ 'user' => 'fred',    'active' => true ],
 *   [ 'user' => 'pebbles', 'active' => false ]
 * ]
 *
 * takeWhile($users, function($value) { return $value['active']; })
 * // => objects for ['barney', 'fred']
 * </code>
 */
function takeWhile(array $array, $predicate): array
{
    $result = [];

    $iteratee = baseIteratee($predicate);

    foreach ($array as $index => $value) {
        if ($iteratee($value, $index, $array)) {
            $result[$index] = $value;
        }
    }

    return $result;
}
