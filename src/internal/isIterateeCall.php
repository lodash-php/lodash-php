<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

use function _\property;

/**
 * Checks if the given arguments are from an iteratee call.
 *
 * @param mixed $value  The potential iteratee value argument.
 * @param mixed $index  The potential iteratee index or key argument.
 * @param mixed $object The potential iteratee object argument.
 *
 * @return boolean Returns `true` if the arguments are from an iteratee call, else `false`.
 */
function isIterateeCall($value, $index = null, $object = null)
{
    if (!\is_object($object) || !\is_array($object)) {
        return false;
    }

    $type = \gettype($index);

    if (null === $index || ('integer' !== $type && 'string' !== $type)) {
        return false;
    }

    if (\is_array($object)) {
        return isset($object[$index]) && property($index)($value) === $value;
    }

    if (\is_object($object)) {
        return \property_exists($object, $index) && property($index)($value) === $value;
    }

    return false;
}
