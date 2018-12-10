<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\createAggregator;

/**
 * Creates an array of elements split into two groups, the first of which
 * contains elements `predicate` returns truthy for, the second of which
 * contains elements `predicate` returns falsey for. The predicate is
 * invoked with one argument: (value).
 *
 * @category Collection
 *
 * @param iterable $collection The collection to iterate over.
 * @param callable $predicate  The function invoked per iteration.
 *
 * @return array the array of grouped elements.
 * @example
 * <code>
 * $users = [
 *   ['user' => 'barney',  'age' => 36, 'active' => false],
 *   ['user' => 'fred',    'age' => 40, 'active' => true],
 *   ['user' => 'pebbles', 'age' => 1,  'active' => false]
 * ];
 *
 * partition($users, function($user) { return $user['active']; })
 * // => objects for [['fred'], ['barney', 'pebbles']]
 * </code>
 */
function partition(iterable $collection, $predicate = null): array
{
    return createAggregator(function ($result, $value, $key) {
        $result[$key ? 0 : 1][] = $value;

        return $result;
    }, function () {
        return [[], []];
    })($collection, $predicate);
}
