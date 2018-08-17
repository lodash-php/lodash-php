<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function basePick($object, $paths): \stdClass
{
    return basePickBy($object, $paths, function ($value, $path) use ($object) {
        return property_exists($object, $path) || method_exists($object, 'get'.(ucfirst($path)));
    });
}
