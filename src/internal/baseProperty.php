<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

/**
 * The base implementation of `_.property` without support for deep paths.
 *
 * @param mixed $key The key of the property to get.
 *
 * @return callable Returns the new accessor function.
 */
function baseProperty($key)
{
    return function ($object) use ($key) {
        return null === $object ? null : $object[$key];
    };
}
