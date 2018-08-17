<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

function baseIntersection($arrays, ?callable $iteratee, $comparator = null)
{
    $includes = $comparator ? '_\internal\arrayIncludesWith' : '_\internal\arrayIncludes';
    $length = \count($arrays[0]);
    $othLength = \count($arrays);
    $othIndex = $othLength;
    $caches = [];
    $maxLength = INF;
    $result = [];

    while ($othIndex--) {
        $array =& $arrays[$othIndex];
        if ($othIndex && $iteratee) {
            $array = \array_map($iteratee, $array);
        }

        $maxLength = \min(\count($array), $maxLength);
        $caches[$othIndex] = !$comparator && $iteratee ? [] : null;
    }

    $array = $arrays[0];

    $index = -1;
    $seen = $caches[0];

    while (++$index < $length && \count($result) < $maxLength) {
        $value = $array[$index];
        $computed = $iteratee ? $iteratee($value) : $value;

        $value = ($comparator ?: $value !== 0) ? $value : 0;
        if (!($seen ? \is_scalar($computed) && isset($seen[$computed]) : $includes($result, $computed, $comparator))) {
            $othIndex = $othLength;
            while (--$othIndex) {
                $cache = $caches[$othIndex];
                if (!(!empty($cache) ? isset($cache[$computed]) : $includes($arrays[$othIndex], $computed, $comparator))) {
                    continue 2;
                }
            }
            if (empty($seen)) {
                $seen[] = $computed;
            }

            $result[] = $value;
        }
    }

    return $result;
}
