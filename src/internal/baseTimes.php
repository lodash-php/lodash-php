<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function baseTimes(int $n, callable $iteratee)
{
    $index = -1;
    $result = [];

    while (++$index < $n) {
        $result[$index] = $iteratee($index);
    }

    return $result;
}
