<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2019
 */

namespace _;

/**
 * Checks value to determine whether a default value should be returned in its place.
 * The defaultValue is returned if value is NaN or null.
 *
 * @category Util
 *
 * @param mixed $value Any value.
 * @param mixed $defaultValue Value to return when $value is null or NAN
 *
 * @return mixed Returns `value`.
 *
 * @author punit-kulal
 *
 * @example
 * <code>
 * $a = null;
 *
 * defaultTo($a, "default");
 * // => "default"
 *
 * $a = "x";
 *
 * defaultTo($a, "default");
 * // => "x"
 * </code>
 */
function defaultTo($value, $defaultValue)
{
    return (null !== $value && (is_object($value) || !\is_nan(\floatval($value)))) ? $value : $defaultValue;
}
