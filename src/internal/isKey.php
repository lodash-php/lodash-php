<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

/** Used to match property names within property paths. */
const reIsDeepProp = '#\.|\[(?:[^[\]]*|(["\'])(?:(?!\1)[^\\\\]|\\.)*?\1)\]#';
const reIsPlainProp = '/^\w*$/';

/**
 * Checks if `value` is a property name and not a property path.
 *
 * @param mixed        $value  The value to check.
 * @param object|array $object The object to query keys on.
 *
 * @return boolean Returns `true` if `value` is a property name, else `false`.
 */
function isKey($value, $object = []): bool
{
    if (\is_array($value)) {
        return false;
    }

    if (\is_numeric($value)) {
        return true;
    }

    return \preg_match(reIsPlainProp, $value) || !\preg_match(reIsDeepProp, $value) || (null !== $object && isset(((object) $object)->$value));
}
