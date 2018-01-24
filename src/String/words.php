<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\unicodeWords;

const asciiWords = '/[^\x00-\x2f\x3a-\x40\x5b-\x60\x7b-\x7f]+/';

const hasUnicodeWord = '/[a-z][A-Z]|[A-Z]{2,}[a-z]|[0-9][a-zA-Z]|[a-zA-Z][0-9]|[^a-zA-Z0-9 ]/';

/**
 * Splits `string` into an array of its words.
 *
 * @category String
 *
 * @param    string $string  The string to inspect.
 * @param   string  $pattern The pattern to match words.
 *
 * @return array Returns the words of `string`.
 *
 * @example
 * <code>
 * words('fred, barney, & pebbles')
 * // => ['fred', 'barney', 'pebbles']
 *
 * words('fred, barney, & pebbles', '/[^, ]+/g')
 * // => ['fred', 'barney', '&', 'pebbles']
 * </code>
 */
function words(string $string, string $pattern = null): array
{
    if (null === $pattern) {
        if (\preg_match(hasUnicodeWord, $string)) {
            return unicodeWords($string);
        }

        \preg_match_all(asciiWords, $string, $matches);

        return $matches[0] ?? [];
    }

    if (\preg_match_all($pattern, $string, $matches) > 0) {
        return $matches[0];
    }

    return [];
}
