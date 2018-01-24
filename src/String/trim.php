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
 * Removes leading and trailing whitespace or specified characters from `string`.
 *
 * @category String
 *
 * @param string $string The string to trim.
 * @param string $chars  The characters to trim.
 *
 * @return string Returns the trimmed string.
 * @example
 * <code>
 * trim('  abc  ')
 * // => 'abc'
 *
 * trim('-_-abc-_-', '_-')
 * // => 'abc'
 * </code>
 */
function trim(string $string, string $chars = ' '): string
{
    return \trim($string, $chars);
}
