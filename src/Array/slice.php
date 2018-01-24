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
 * Creates a slice of `array` from `start` up to, but not including, `end`.
 *
 * @category Array
 *
 * @param array  $array The array to slice.
 * @param    int $start The start position.
 * @param    int $end   The end position.
 *
 * @return array the slice of `array`.
 */
function slice(array $array, int $start, int $end = null): array
{
    return \array_slice($array, $start, $end);
}
