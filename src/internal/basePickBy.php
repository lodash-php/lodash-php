<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function basePickBy($object, $paths, callable $predicate): \stdClass
{
    $index = -1;
    $length = \is_array($paths) ? \count($paths) : \strlen($paths);
    $result = new \stdClass();

    while (++$index < $length) {
        $path = $paths[$index];
        $value = baseGet($object, $path);

        if ($predicate($value, $path)) {
            baseSet($result, castPath($path, $object), $value);
        }
    }

    return $result;
}
