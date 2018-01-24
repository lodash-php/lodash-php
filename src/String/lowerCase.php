<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

const reQuotes = "/['\x{2019}]/u";

/**
 * Converts `string`, as space separated words, to lower case.
 *
 * @category String
 *
 * @param string $string The string to convert.
 *
 * @return string Returns the lower cased string.
 * @example
 * <code>
 * lowerCase('--Foo-Bar--')
 * // => 'foo bar'
 *
 * lowerCase('fooBar')
 * // => 'foo bar'
 *
 * lowerCase('__FOO_BAR__')
 * // => 'foo bar'
 * </code>
 */
function lowerCase(string $string)
{
    return \implode(' ', \array_map('\strtolower', words(\preg_replace(reQuotes, '', $string))));
}
