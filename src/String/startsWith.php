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
 * Checks if `string` starts with the given target string.
 *
 * @category String
 *
 * @param string $string   The string to inspect.
 * @param string $target   The string to search for.
 * @param int    $position The position to search from.
 *
 * @return boolean Returns `true` if `string` starts with `target`, else `false`.
 * @example
 * <code>
 * startsWith('abc', 'a')
 * // => true
 *
 * startsWith('abc', 'b')
 * // => false
 *
 * startsWith('abc', 'b', 1)
 * // => true
 * </code>
 */
function startsWith(string $string, string $target, int $position = null): bool
{
    $length = \strlen($string);
    $position = null === $position ? 0 : +$position;

    if ($position < 0) {
        $position = 0;
    } elseif ($position > $length) {
        $position = $length;
    }

    return $position >= 0 && \substr($string, $position, \strlen($target)) === $target;
}
