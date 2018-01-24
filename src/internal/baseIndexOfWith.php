<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

function baseIndexOfWith(array $array, $value, int $fromIndex, $comparator)
{
    $index = $fromIndex - 1;

    foreach (\array_slice($array, $fromIndex, null, true) as $val) {
        ++$index;
        if ($comparator($val, $value)) {
            return $index;
        }
    }

    return -1;
}
