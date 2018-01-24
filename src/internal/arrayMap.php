<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function arrayMap(?array $array, callable $iteratee)
{
    $index = -1;
    $length = null === $array ? 0 : \count($array);
    $result = [];

    while (++$index < $length) {
        $result[$index] = $iteratee($array[$index], $index, $array);
    }

    return $result;
}
