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
 * Creates a function that provides `value` to `wrapper` as its first
 * argument. Any additional arguments provided to the function are appended
 * to those provided to the `wrapper`.
 *
 * @category Function
 *
 * @param mixed    $value   The value to wrap.
 * @param callable $wrapper The wrapper function.
 *
 * @return callable the new function.
 * @example
 * <code>
 * $p = wrap('_\escape', function($func, $text) {
 *     return '<p>' . $func($text) . '</p>';
 * });
 *
 * $p('fred, barney, & pebbles');
 * // => '<p>fred, barney, &amp; pebbles</p>'
 * </code>
 */
function wrap($value, callable $wrapper = null): callable
{
    return partial($wrapper ?? '\_\identity', $value);
}
