<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function arrayPush(&$array, $values)
{
    $index = -1;
    $length = \is_array($values) ? \count($values) : \strlen($values);
    $offset = \count($array);

    while (++$index < $length) {
        $array[$offset + $index] = $values[$index];
    }

    return $array;
}
