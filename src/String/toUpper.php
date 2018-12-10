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
 * Converts `string`, as a whole, to upper case
 *
 * @category String
 *
 * @param string $string The string to convert.
 *
 * @return string Returns the upper cased string.
 * @example
 * <code>
 * toUpper('--foo-bar--')
 * // => '--FOO-BAR--'
 *
 * toUpper('fooBar')
 * // => 'FOOBAR'
 *
 * toUpper('__foo_bar__')
 * // => '__FOO_BAR__'
 * </code>
 */
function toUpper(string $string): string
{
    return \strtoupper($string);
}
