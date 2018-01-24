<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

function arrayIncludesWith(?array $array, $value, callable $comparator)
{
    $array = $array ?? [];

    foreach ($array as $v) {
        if ($comparator($value, $v)) {
            return true;
        }
    }

    return false;
}
