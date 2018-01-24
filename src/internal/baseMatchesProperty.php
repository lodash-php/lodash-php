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

function baseMatchesProperty($property, $source): callable
{
    return function ($value, $index, $collection) use ($property, $source) {
        return isEqual(property($property)($value, $index, $collection), $source);
    };
}
