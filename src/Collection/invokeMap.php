<?php

// No 'declare(strict_types=1)' here as the invoked method needs to use weak-type

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseInvoke;
use function _\internal\baseRest;

/**
 * Invokes the method at `path` of each element in `collection`, returning
 * an array of the results of each invoked method. Any additional arguments
 * are provided to each invoked method. If `path` is a function, it's invoked
 * for, and `this` bound to, each element in `collection`.
 *
 * @category Collection
 *
 * @param iterable              $collection The collection to iterate over.
 * @param array|callable|string $path       The path of the method to invoke or the function invoked per iteration.
 * @param array                 $args       The arguments to invoke each method with.
 *
 * @return array the array of results.
 * @example
 * <code>
 * invokeMap([[5, 1, 7], [3, 2, 1]], function($result) { sort($result); return $result;})
 * // => [[1, 5, 7], [1, 2, 3]]
 *
 * invokeMap([123, 456], 'str_split')
 * // => [['1', '2', '3'], ['4', '5', '6']]
 * </code>
 */
function invokeMap(iterable $collection, $path, array $args = []): array
{
    return baseRest(function ($collection, $path, $args) {
        $isFunc = \is_callable($path);
        $result = [];

        each($collection, function ($value) use (&$result, $isFunc, $path, $args) {
            $result[] = $isFunc ? $path($value, ...$args) : baseInvoke($value, $path, $args);
        });

        return $result;
    })($collection, $path, ...$args);
}
