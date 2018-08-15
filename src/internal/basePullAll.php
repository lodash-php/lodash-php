<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

function basePullAll(&$array, array $values, ?callable $iteratee, callable $comparator = null)
{
    $indexOf = $comparator ? '_\\internal\\baseIndexOfWith' : '_\\indexOf';

    $seen = $array;

    if ($iteratee) {
        $seen = \array_map($iteratee, $array);
    }

    foreach ($values as $value) {
        $fromIndex = 0;
        $computed = $iteratee ? $iteratee($value) : $value;

        while (($fromIndex = $indexOf($seen, $computed, $fromIndex, $comparator)) > -1) {
            \array_splice($array, $fromIndex, 1);
            if ($seen !== $array) {
                \array_splice($seen, $fromIndex, 1);
            }
        }
    }

    return $array;
}
