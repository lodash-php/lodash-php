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
 * Creates a function that invokes `func`, with up to `n` arguments,
 * ignoring any additional arguments.
 *
 * @category Function
 *
 * @param callable $func The function to cap arguments for.
 * @param int      $n    The arity cap.
 *
 * @return Callable Returns the new capped function.
 *
 * @example
 * <code>
 * map(['6', '8', '10'], ary('intval', 1));
 * // => [6, 8, 10]
 * </code>
 */
function ary(callable $func, int $n): callable
{
    return function (...$args) use ($func, $n) {
        \array_splice($args, $n);

        return $func(...$args);
    };
}
