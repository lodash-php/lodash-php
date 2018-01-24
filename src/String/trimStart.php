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
 * Removes leading whitespace or specified characters from `string`.
 *
 * @param string $string The string to trim.
 * @param string $chars  The characters to trim.
 *
 * @category String
 *
 * @return string Returns the trimmed string.
 * @example
 * <code>
 * trimStart('  abc  ')
 * // => 'abc  '
 *
 * trimStart('-_-abc-_-', '_-')
 * // => 'abc-_-'
 * </code>
 */
function trimStart(string $string, string $chars = ' '): string
{
    return \ltrim($string, $chars);
}
