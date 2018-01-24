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
 * Checks if `string` ends with the given target string.
 *
 * @category String
 *
 * @param string $string   The string to inspect.
 * @param string $target   The string to search for.
 * @param int    $position The position to search up to.
 *
 * @return boolean Returns `true` if `string` ends with `target`, else `false`.
 * @example
 * <code>
 * endsWith('abc', 'c')
 * // => true
 *
 * endsWith('abc', 'b')
 * // => false
 *
 * endsWith('abc', 'b', 2)
 * // => true
 * </code>
 */
function endsWith(string $string, string $target, int $position = null): bool
{
    $length = \strlen($string);
    $position = null === $position ? $length : +$position;

    if ($position < 0) {
        $position = 0;
    } elseif ($position > $length) {
        $position = $length;
    }

    $position -= \strlen($target);

    return $position >= 0 && \substr($string, $position, \strlen($target)) === $target;
}
