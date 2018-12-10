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
 * Invokes `func` after `wait` milliseconds. Any additional arguments are
 * provided to `func` when it's invoked.
 *
 * @category Function
 *
 * @param callable          $func The function to delay.
 * @param int               $wait The number of milliseconds to delay invocation.
 * @param array<int, mixed> $args
 *
 * @return int the timer id.
 * @example
 * <code>
 * delay(function($text) {
 *   echo $text;
 * }, 1000, 'later');
 * // => Echo 'later' after one second.
 * </code>
 */
function delay(callable $func, int $wait = 1, ...$args): int
{
    usleep($wait * 1000);

    $func(...$args);

    return 1;
}
