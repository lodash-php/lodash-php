<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\arrayMap;
use function _\internal\baseIteratee;
use function _\internal\basePickBy;

/**
 * Creates an object composed of the `object` properties `predicate` returns
 * truthy for. The predicate is invoked with two arguments: (value, key).
 *
 * @category Object
 *
 * @param object|null $object    The source object.
 * @param callable    $predicate The function invoked per property.
 *
 * @return \stdClass Returns the new object.
 * @example
 * <code>
 * $object = (object) ['a' => 1, 'b' => 'abc', 'c' => 3];
 *
 * pickBy(object, 'is_numeric');
 * // => (object) ['a' => 1, 'c' => 3]
 * </code>
 */
function pickBy($object, callable $predicate): \stdClass
{
    if (null === $object) {
        return new \stdClass;
    }

    $props = arrayMap(\array_keys(\get_object_vars($object)), function ($prop) {
        return [$prop];
    });
    $predicate = baseIteratee($predicate);

    return basePickBy($object, $props, function ($value, $path) use ($predicate) {
        return $predicate($value, $path[0]);
    });
}
