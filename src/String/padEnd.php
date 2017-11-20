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
 * Pads `string` on the right side if it's shorter than `length`. Padding
 * characters are truncated if they exceed `length`.
 *
 * @category String
 *
 * @param string $string The string to pad.
 * @param int    $length The padding length.
 * @param string $chars  The string used as padding.
 *
 * @return string Returns the padded string.
 *
 * @example
 * <code>
 * padEnd('abc', 6)
 * // => 'abc   '
 *
 * padEnd('abc', 6, '_-')
 * // => 'abc_-_'
 *
 * padEnd('abc', 2)
 * // => 'abc'
 * </code>
 */
function padEnd(string $string, int $length, string $chars = ' '): string
{
    return \str_pad($string, $length, $chars, \STR_PAD_RIGHT);
}
