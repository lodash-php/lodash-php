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
 * Creates a function that invokes `func`, with the arguments
 * of the created function, while it's called less than `n` times. Subsequent
 * calls to the created function return the result of the last `func` invocation.
 *
 * @category Function
 *
 * @param int      $n    The number of calls at which `func` is no longer invoked.
 * @param callable $func The function to restrict.
 *
 * @return callable Returns the new restricted function.
 *
 * @example
 * <code>
 * $users = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
 * $result = uniqBy(map($users, before(5, [$repository, 'find'])), 'id')
 * // => Fetch up to 4 results.
 * </code>
 */
function before(int $n, callable $func): callable
{
    $result = null;

    return function (...$args) use (&$result, &$n, &$func) {
        if (--$n > 0) {
            $result = $func(...$args);
        }

        return $result;
    };
}
