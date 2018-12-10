<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _;

/**
 * Creates a function that negates the result of the predicate `func`
 *
 * @category Function
 *
 * @param callable $predicate The predicate to negate.
 *
 * @return callable Returns the new negated function.
 *
 * @example
 * <code>
 * function isEven($n) {
 *   return $n % 2 == 0;
 * }
 *
 * filter([1, 2, 3, 4, 5, 6], negate($isEven));
 * // => [1, 3, 5]
 * </code>
 */

function negate(callable $predicate): callable
{
    return function () use ($predicate) {
        return !$predicate(...\func_get_args());
    };
}
