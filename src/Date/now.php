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
 * Gets the timestamp of the number of milliseconds that have elapsed since the Unix epoch (1 January 1970 00:00:00 UTC).
 *
 * @return int Returns the timestamp.
 *
 * @category Date
 *
 * @example
 * <code>
 * now();
 * // => 1511180325735
 * </code>
 */
function now(): int
{
    return (int) (\microtime(true) * 1000);
}
