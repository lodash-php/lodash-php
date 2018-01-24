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
 * Converts `string` to an integer of the specified radix. If `radix` is
 * `undefined` or `0`, a `radix` of `10` is used unless `string` is a
 * hexadecimal, in which case a `radix` of `16` is used.
 *
 * **Note:** This method uses PHP's built-in integer casting, which does not necessarily align with the
 * [ES5 implementation](https://es5.github.io/#x15.1.2.2) of `parseInt`.
 *
 * @category String
 *
 * @param int|float|string $string The string to convert.
 * @param int              $radix  The radix to interpret `string` by.
 *
 * @return int Returns the converted integer.
 *
 * @example
 * <code>
 * parseInt('08')
 * // => 8
 * </code>
 */
function parseInt($string, int $radix = null): int
{
    if (null === $radix) {
        $radix = 10;
    } elseif ($radix) {
        $radix = +$radix;
    }

    return \intval($string, $radix);
}
