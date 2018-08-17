<?php

// No 'declare(strict_types=1)' here as the invoked method needs to use weak-type{

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

use function _\last;

function baseInvoke($object, $path, $args)
{
    $path = castPath($path, $object);
    $object = parent($object, $path);
    /** @var callable|null $func */
    $func = null === $object ? $object : [$object, toKey(last($path))];

    return \is_callable($func) ? $func($object, ...$args) : null;
}
