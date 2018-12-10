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

/**
 * Creates a function that invokes `func` with the `this` binding of the
 * created function and arguments from `start` and beyond provided as
 * an array.
 *
 * @category Function
 *
 * @param callable $func  The function to apply a rest parameter to.
 * @param int|null   $start The start position of the rest parameter.
 *
 * @return callable Returns the new function.
 *
 * @example
 * <code>
 * $say = rest(function($what, $names) {
 *   return $what . ' ' . implode(', ', initial($names)) .
 *     (size($names) > 1 ? ', & ' : '') . last($names);
 * });
 *
 * $say('hello', 'fred', 'barney', 'pebbles');
 * // => 'hello fred, barney, & pebbles'
 * </code>
 */
function rest(callable $func, ?int $start = null): callable
{
    return baseRest($func, $start);
}
