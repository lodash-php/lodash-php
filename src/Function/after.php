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
 * The opposite of `before`; this method creates a function that invokes
 * `func` once it's called `n` or more times.
 *
 * @category Function
 *
 * @param int      $n    The number of calls before `func` is invoked.
 * @param Callable $func The function to restrict.
 *
 * @return Callable Returns the new restricted function.
 *
 * @example
 * <code>
 * $saves = ['profile', 'settings'];
 *
 * $done = after(count($saves), function() {
 *   echo 'done saving!';
 * });
 *
 * forEach($saves, function($type) use($done) {
 *   asyncSave([ 'type' => $type, 'complete' => $done ]);
 * });
 * // => Prints 'done saving!' after the two async saves have completed.
 * </code>
 */
function after(int $n, callable $func): callable
{
    return function (...$args) use (&$n, $func) {
        if (--$n < 1) {
            return $func(...$args);
        }
    };
}
