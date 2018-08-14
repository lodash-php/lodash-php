<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

const HOT_COUNT = 800;
const HOT_SPAN = 16;

/**
 * Creates a function that'll short out and invoke `identity` instead
 * of `func` when it's called `HOT_COUNT` or more times in `HOT_SPAN`
 * milliseconds.
 *
 * @private
 *
 * @param callable $func The function to restrict.
 *
 * @return callable Returns the new shortable function.
 */
function shortOut(callable $func): callable
{
    $count = 0;
    $lastCalled = 0;

    return function () use ($func, &$count, &$lastCalled) {
        $stamp = microtime(true);
        $remaining = HOT_SPAN - ($stamp - $lastCalled);

        $lastCalled = $stamp;
        if ($remaining > 0) {
            if (++$count >= HOT_COUNT) {
                return func_get_arg(0);
            }
        } else {
            $count = 0;
        }

        return $func(...func_get_args());
    };
}
