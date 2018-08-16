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
 * Gets the size of a Unicode `string`.
 *
 * @private
 *
 * @param string $string The string inspect.
 *
 * @return int Returns the string size.
 */
function unicodeSize(string $string): int
{
    return \preg_match_all(reUnicode, $string) ?: 0;
}
