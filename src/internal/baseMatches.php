<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

use function _\isEqual;
use function _\property;

function baseMatches($source): callable
{
    return function ($value, $index, $collection) use ($source): bool {
        if ($value === $source || isEqual($value, $source)) {
            return true;
        }

        if (\is_iterable($source)) {
            foreach ($source as $k => $v) {
                if (!isEqual(property($k)($value, $index, $collection), $v)) {
                    return false;
                }
            }

            return true;
        }

        return false;
    };
}
