<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function baseSet($object, $path, $value, callable $customizer = null)
{
    if (!\is_object($object)) {
        return $object;
    }

    $path = castPath($path, $object);

    $index = -1;
    $length = \count($path);
    $lastIndex = $length - 1;
    $nested = $object;

    while ($nested !== null && ++$index < $length) {
        $key = toKey($path[$index]);

        if ($index !== $lastIndex) {
            $objValue = \is_array($nested) ? ($nested[$key] ?? null) : ($nested->$key ?? null);
            $newValue = $customizer ? $customizer($objValue, $key, $nested) : $objValue;
            if (null === $newValue) {
                $newValue = \is_object($objValue) ? $objValue : (\is_numeric($path[$index + 1]) ? [] : new \stdClass());
            }

            if (\is_array($nested)) {
                $nested[$key] = $newValue;
            } else {
                $nested->{$key} = $newValue;
            }

            if (\is_array($nested)) {
                $nested = &$nested[$key];
            } else {
                $nested = &$nested->$key;
            }

            continue;
        }

        $nested->{$key} = $value;
    }

    return $object;
}
