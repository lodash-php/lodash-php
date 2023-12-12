<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

/**
 * Creates a slice of `array` excluding elements dropped from the beginning.
 * Elements are dropped until `predicate` returns falsey. The predicate is
 * invoked with three arguments: (value, index, array).
 *
 * @category Array
 *
 * @param array    $array     The array to query.
 * @param callable $predicate The function invoked per iteration.
 *
 * @return array the slice of `array`.
 * @example
 * <code>
 * $users = [
 *   [ 'user' => 'barney',  'active' => true ],
 *   [ 'user' => 'fred',    'active' => true ],
 *   [ 'user' => 'pebbles', 'active' => false ]
 * ]
 *
 * dropWhile($users, function($user) { return $user['active']; } )
 * // => objects for ['pebbles']
 * </code>
 */
function dropWhile(array $array, callable $predicate): array
{
    \reset($array);
    $count = \count($array);
    $length = 0;
    $index = \key($array);
    $value = \current($array);
    while ($length <= $count && $predicate($value, $index, $array)) {
        array_shift($array);
        \reset($array);
        $length++;
        $index = \key($array);
        $value = \current($array);
    }

    return $array;
}
