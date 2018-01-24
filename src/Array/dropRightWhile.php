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
 * Creates a slice of `array` excluding elements dropped from the end.
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
 *   [ 'user' => 'barney',  'active' => false ],
 *   [ 'user' => 'fred',    'active' => true ],
 *   [ 'user' => 'pebbles', 'active' => true ]
 * ]
 *
 * dropRightWhile($users, function($user) { return $user['active']; })
 * // => objects for ['barney']
 * </code>
 */
function dropRightWhile(array $array, callable $predicate): array
{
    \end($array);
    $length = \count($array);
    $index = \key($array);
    while ($length && $predicate($array[$index], $index, $array)) {
        array_pop($array);
        $length--;
        \end($array);
        $index = \key($array);
    }

    return $array;
}
