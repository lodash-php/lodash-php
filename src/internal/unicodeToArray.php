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
 * Converts a Unicode `string` to an array.
 *
 * @private
 *
 * @param string $string The string to convert.
 *
 * @return array Returns the converted array.
 */
function unicodeToArray(string $string): array
{
    if (\preg_match_all('#'.reUnicode.'#u', $string, $matches)) {
        return $matches[0];
    }

    return [];
}
