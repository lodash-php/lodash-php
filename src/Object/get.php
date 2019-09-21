<?php

declare(strict_types = 1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2019
 */

namespace _;

use function _\internal\baseGet;

/**
 * Gets the value at path of object. If the resolved value is null the defaultValue is returned in its place.
 *
 * @category Object
 *
 * @param mixed $object The associative array or object to fetch value from
 * @param array|string $path Dot separated or array of string
 * @param mixed $defaultValue (optional)The value returned for unresolved or null values.
 *
 * @return mixed Returns the resolved value.
 *
 * @author punit-kulal
 *
 * @example
 * <code>
 * $sampleArray = ["key1" => ["key2" => ["key3" => "val1", "key4" => ""]]];
 * get($sampleArray, 'key1.key2.key3');
 * // => "val1"
 *
 * get($sampleArray, 'key1.key2.key5', "default");
 * // => "default"
 *
 * get($sampleArray, 'key1.key2.key4', "default");
 * // => ""
 * </code>
 */
function get($object, $path, $defaultValue = null)
{
    return ($object !== null ? baseGet($object, $path) : null) ?? $defaultValue;
}
