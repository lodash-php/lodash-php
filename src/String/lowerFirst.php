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
 * Converts the first character of `string` to lower case.
 *
 * @category String
 *
 * @param string $string The string to convert.
 *
 * @return string Returns the converted string.
 * @example
 * <code>
 * lowerFirst('Fred')
 * // => 'fred'
 *
 * lowerFirst('FRED')
 * // => 'fRED'
 * </code>
 */

function lowerFirst(string $string): string
{
    return \lcfirst($string);
}
