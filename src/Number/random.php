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
 * Produces a random number between the inclusive `lower` and `upper` bounds.
 * If only one argument is provided a number between `0` and the given number
 * is returned. If `floating` is `true`, or either `lower` or `upper` are
 * floats, a floating-point number is returned instead of an integer.
 *
 * @category Number
 *
 * @param int|float|bool $lower    The lower bound.
 * @param int|float|bool $upper    The upper bound.
 * @param bool|null      $floating Specify returning a floating-point number.
 *
 * @return int|float Returns the random number.
 *
 * @example
 * <code>
 * random(0, 5)
 * // => an integer between 0 and 5
 *
 * random(5)
 * // => also an integer between 0 and 5
 *
 * random(5, true)
 * // => a floating-point number between 0 and 5
 *
 * random(1.2, 5.2)
 * // => a floating-point number between 1.2 and 5.2
 * </code>
 */
function random($lower = null, $upper = null, $floating = null)
{
    if (null === $floating) {
        if (\is_bool($upper)) {
            $floating = $upper;
            $upper = null;
        } elseif (\is_bool($lower)) {
            $floating = $lower;
            $lower = null;
        }
    }

    if (null === $lower && null === $upper) {
        $lower = 0;
        $upper = 1;
    } elseif (null === $upper) {
        $upper = $lower;
        $lower = 0;
    }

    if ($lower > $upper) {
        $temp = $lower;
        $lower = $upper;
        $upper = $temp;
    }

    $floating = $floating || (\is_float($lower) || \is_float($upper));

    if ($floating || $lower % 1 || $upper % 1) {
        $randMax = \mt_getrandmax();

        return $lower + \abs($upper - $lower) * \mt_rand(0, $randMax) / $randMax;
    }

    return \rand((int) $lower, (int) $upper);
}
