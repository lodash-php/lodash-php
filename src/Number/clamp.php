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
 * Clamps `number` within the inclusive `lower` and `upper` bounds.
 *
 * @category Number
 *
 * @param int $number The number to clamp.
 * @param int $lower  The lower bound.
 * @param int $upper  The upper bound.
 *
 * @return int Returns the clamped number.
 *
 * @example
 * <code>
 * clamp(-10, -5, 5)
 * // => -5
 *
 * clamp(10, -5, 5)
 * // => 5
 * </code>
 */
function clamp(int $number, int $lower, int $upper): int
{
    $number = $number <= $upper ? $number : $upper;
    $number = $number >= $lower ? $number : $lower;

    return $number;
}
