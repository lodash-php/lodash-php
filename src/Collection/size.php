<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

/**
 * Gets the size of `collection` by returning its length for array
 * values or the number of public properties for objects.
 *
 * @category Collection
 *
 * @param array|object|string $collection The collection to inspect.
 *
 * @return int Returns the collection size.
 * @example
 * <code>
 * size([1, 2, 3]);
 * // => 3
 *
 * size(new class { public $a = 1; public $b = 2; private $c = 3; });
 * // => 2
 *
 * size('pebbles');
 * // => 7
 * </code>
 */
function size($collection): int
{
    if (\is_string($collection)) {
        return \strlen($collection);
    }

    if (\is_array($collection) || $collection instanceof \Countable) {
        return \count($collection);
    }

    if ($collection instanceof \Traversable) {
        return \count(\iterator_to_array($collection));
    }

    if (\is_object($collection)) {
        return \count(\get_object_vars($collection));
    }

    return 0;
}
