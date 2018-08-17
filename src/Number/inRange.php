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
 * Checks if `number` is between `start` and up to, but not including, `end`. If
 * `end` is not specified, it's set to `start` with `start` then set to `0`.
 * If `start` is greater than `end` the params are swapped to support
 * negative ranges.
 *
 * @category Number
 *
 * @param float $number The number to check.
 * @param float $start  The start of the range.
 * @param float $end    The end of the range.
 *
 * @return boolean Returns `true` if `number` is in the range, else `false`.
 *
 * @example
 * <code>
 * inRange(3, 2, 4)
 * // => true
 *
 * inRange(4, 8)
 * // => true
 *
 * inRange(4, 2)
 * // => false
 *
 * inRange(2, 2)
 * // => false
 *
 * inRange(1.2, 2)
 * // => true
 *
 * inRange(5.2, 4)
 * // => false
 *
 * inRange(-3, -2, -6)
 * // => true
 * </code>
 */
function inRange(float $number, float $start = 0, float $end = 0): bool
{
    if (0.0 === $end) {
        $end = $start;
        $start = 0;
    }

    return $number >= \min($start, $end) && $number < \max($start, $end);
}
