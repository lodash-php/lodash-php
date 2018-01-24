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
 * Converts `string` to [camel case](https://en.wikipedia.org/wiki/CamelCase).
 *
 * @category String
 *
 * @param string $string The string to convert.
 *
 * @return string Returns the camel cased string.
 *
 * @example
 * <code>
 * camelCase('Foo Bar')
 * // => 'fooBar'
 *
 * camelCase('--foo-bar--')
 * // => 'fooBar'
 *
 * camelCase('__FOO_BAR__')
 * // => 'fooBar'
 * </code>
 */
function camelCase(string $string): string
{
    return \lcfirst(\array_reduce(words(\preg_replace("/['\\x{2019}]/u", '', $string)), function ($result, $word) {
        return $result.capitalize(\strtolower($word));
    }, ''));
}
