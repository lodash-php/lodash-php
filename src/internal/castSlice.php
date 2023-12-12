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
 * Casts `array` to a slice if it's needed.
 *
 * @private
 *
 * @param array $array The array to inspect.
 * @param int   $start The start position.
 * @param int   $end   The end position.
 *
 * @return array Returns the cast slice.
 */
function castSlice(array $array, int $start, ?int $end = null): array
{
    $length = \count($array);
    $end = $end ?? $length;

    return (!$start && $end >= $length) ? $array : \array_slice($array, $start, $end);
}
