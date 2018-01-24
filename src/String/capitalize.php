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
 * Converts the first character of `string` to upper case and the remaining
 * to lower case.
 *
 * @category String
 *
 * @param string $string The string to capitalize.
 *
 * @return string Returns the capitalized string.
 * @example
 * <code>
 * capitalize('FRED')
 * // => 'Fred'
 * </code>
 */

function capitalize(string $string): string
{
    return \ucfirst(\mb_strtolower($string));
}
