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
 * Creates a function that invokes `func` with arguments reversed.
 *
 * @category Function
 *
 * @param callable $func The function to flip arguments for.
 *
 * @return callable Returns the new flipped function.
 *
 * @example
 * <code>
 * $flipped = flip(function() {
 *   return func_get_args();
 * });
 *
 * flipped('a', 'b', 'c', 'd');
 * // => ['d', 'c', 'b', 'a']
 * </code>
 */
function flip(callable $func): callable
{
    return function (...$values) use ($func) {
        return \array_reverse($func(...$values), false);
    };
}
