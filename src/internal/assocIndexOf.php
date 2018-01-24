<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

use function _\eq;

function assocIndexOf(array $array, $key): int
{
    $length = \count($array);
    while ($length--) {
        if (eq($array[$length][0], $key)) {
            return $length;
        }
    }

    return -1;
}
