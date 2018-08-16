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
 * Replaces matches for `pattern` in `string` with `replacement`.
 *
 * **Note:** This method is based on
 * [`String#replace`](https://mdn.io/String/replace).
 *
 * @category String
 *
 * @param string          $string      The string to modify.
 * @param string          $pattern     The pattern to replace.
 * @param callable|string $replacement The match replacement.
 *
 * @return string Returns the modified string.
 *
 * @example
 * <code>
 * replace('Hi Fred', 'Fred', 'Barney')
 * // => 'Hi Barney'
 * </code>
 */
function replace(string $string, string $pattern, $replacement = ''): string
{
    $callback = function (array $matches) use ($replacement): ?string {
        if (!\array_filter($matches)) {
            return null;
        }

        return $replacement(...$matches);
    };

    if (\preg_match(reRegExpChar, $pattern)) {
        if (!\is_callable($replacement)) {
            return \preg_replace($pattern, $replacement, $string);
        }

        return \preg_replace_callback($pattern, $callback, $string);
    }

    return \str_replace($pattern, $replacement, $string);
}
