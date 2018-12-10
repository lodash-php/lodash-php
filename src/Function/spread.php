<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseRest;
use function _\internal\castSlice;

/**
 * Creates a function that invokes `func` with the `this` binding of the
 * create function and an array of arguments much like
 * [`Function#apply`](http://www.ecma-international.org/ecma-262/7.0/#sec-function.prototype.apply).
 *
 * **Note:** This method is based on the
 * [spread operator](https://mdn.io/spread_operator).
 *
 * @static
 * @memberOf _
 * @since    3.2.0
 * @category Function
 *
 * @param callable $func The function to spread arguments over.
 * @param int $start The start position of the spread.
 *
 * @return callable Returns the new function.
 *
 * @example
 * <code>
 * $say = spread(function($who, $what) {
 *   return $who . ' says ' . $what;
 * });
 *
 * $say(['fred', 'hello']);
 * // => 'fred says hello'
 * </code>
 */
function spread(callable $func, ?int $start = null)
{
    $start = null === $start ? 0 : \max($start, 0);

    return baseRest(function ($args) use ($start, $func) {
        $array = $args[$start];
        $otherArgs = castSlice($args, 0, $start);

        if ($array) {
            $otherArgs = \array_merge($otherArgs, $array);
        }

        return $func(...$otherArgs);
    });
}
