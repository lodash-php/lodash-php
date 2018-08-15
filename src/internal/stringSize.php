<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

/**
 * Gets the number of symbols in `string`.
 *
 * @private
 *
 * @param string $string The string to inspect.
 *
 * @return int Returns the string size.
 */
function stringSize(string $string): int
{
    return hasUnicode($string) ? unicodeSize($string) : \strlen($string);
}
