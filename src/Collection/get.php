<?php

declare(strict_types = 1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

/**
 * Gets the value at path of object. If the resolved value is undefined, the defaultValue is returned in its place.
 *
 * @category Collection
 *
 * @param array|object $object The associative array or object to fetch value from
 * @param array|string $path Dot separated or array of string
 * @param mixed $defaultValue The value to be returned when data
 * @param bool $defaultOnEmpty To check whether value is empty or isset
 *
 * @return array Returns the composed aggregate object.
 * @example
 * <code>
 * get(, 'floor');
 * // => ['6' => 2, '4' => 1]
 *
 * // The `property` iteratee shorthand.
 * countBy(['one', 'two', 'three'], 'strlen');
 * // => ['3' => 2, '5' => 1]
 * </code>
 */
function get($object, $path, $defaultValue, bool $defaultOnEmpty = false) {
    if (is_string($path)) {
        $paths = explode(".", $path);
    } else {
        $paths = $path;
    }
    $temp = $object;


    foreach ($paths as $tempPath) {
        if (is_array($temp)) {
            $valuePresent = $defaultOnEmpty ? !empty($temp[$tempPath]) : isset($temp[$tempPath]);
            if ($valuePresent) {
                $temp = $temp[$tempPath];
            } else {
                return $defaultValue;
            }
        }elseif(is_object($temp)){
            $valuePresentObject = $defaultOnEmpty ? !empty($temp->{$tempPath}):isset($temp->{$tempPath}) ;
            if ($valuePresentObject) {
                $temp = $temp->{$tempPath};
            } else {
                return $defaultValue;
            }
        }else{
            return $defaultValue;
        }
    }


    return $temp;
}