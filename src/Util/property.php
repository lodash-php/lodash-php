<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use Symfony\Component\PropertyAccess\Exception\NoSuchIndexException;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Creates a function that returns the value at `path` of a given object.
 *
 * @category Util
 *
 * @param array|string $path The path of the property to get.
 *
 * @return callable Returns the new accessor function.
 * @example
 * <code>
 * $objects = [
 *   [ 'a' => [ 'b' => 2 ] ],
 *   [ 'a' => [ 'b' => 1 ] ]
 * ];
 *
 * map($objects, property('a.b'));
 * // => [2, 1]
 *
 * map(sortBy($objects, property(['a', 'b'])), 'a.b');
 * // => [1, 2]
 * </code>
 */
function property($path): callable
{
    $propertyAccess = PropertyAccess::createPropertyAccessorBuilder()
        ->disableExceptionOnInvalidIndex()
        ->getPropertyAccessor();

    return function ($value, $index = 0, $collection = []) use ($path, $propertyAccess) {
        $path = \implode('.', (array) $path);

        if (\is_array($value)) {
            if (false !== \strpos($path, '.')) {
                $paths = \explode('.', $path);

                foreach ($paths as $path) {
                    $value = property($path)($value, $index, $collection);
                }

                return $value;
            }

            if (\is_string($path) && $path[0] !== '[' && $path[-1] !== ']') {
                $path = "[$path]";
            }
        }

        try {
            return $propertyAccess->getValue($value, $path);
        } catch (NoSuchPropertyException | NoSuchIndexException $e) {
            return null;
        }
    };
}
