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
 * Converts `string` to
 * [kebab case](https://en.wikipedia.org/wiki/Letter_case#Special_case_styles).
 *
 * @category String
 *
 * @param string $string The string to convert.
 *
 * @return string Returns the kebab cased string.
 * @example
 * <code>
 * kebabCase('Foo Bar')
 * // => 'foo-bar'
 *
 * kebabCase('fooBar')
 * // => 'foo-bar'
 *
 * kebabCase('__FOO_BAR__')
 * // => 'foo-bar'
 * </code>
 */
function kebabCase(string $string)
{
    return \implode('-', \array_map('\strtolower', words(\preg_replace("/['\x{2019}]/u", '', $string))));
}
