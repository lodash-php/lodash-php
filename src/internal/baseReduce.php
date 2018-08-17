<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function baseReduce(iterable $array, $iteratee, $accumulator, $initAccum = null)
{
    $length = \is_array($array) || $array instanceof \Countable ? \count($array) : 0;

    if ($initAccum && $length) {
        $accumulator = \current($array);
    }

    foreach ($array as $key => $value) {
        $accumulator = $iteratee($accumulator, $value, $key, $array);
    }

    return $accumulator;
}
