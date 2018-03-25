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
 * Creates an array composed of keys generated from the results of running
 * each element of `collection` through `iteratee`. The corresponding value of
 * each key is the number of times the key was returned by `iteratee`. The
 * iteratee is invoked with one argument: (value).
 *
 * @category Collection
 *
 * @param iterable $collection The collection to iterate over.
 * @param callable $iteratee   The iteratee to transform keys.
 *
 * @return array Returns the composed aggregate object.
 * @example
 * <code>
 * countBy([6.1, 4.2, 6.3], 'floor');
 * // => ['6' => 2, '4' => 1]
 *
 * // The `property` iteratee shorthand.
 * countBy(['one', 'two', 'three'], 'strlen');
 * // => ['3' => 2, '5' => 1]
 * </code>
 */
function countBy(iterable $collection, callable $iteratee = null): array
{
    if (!$iteratee) {
        $iteratee = '_\identity';
    }

    $result = [];

    foreach ($collection as $value) {
        if (!\is_scalar($value)) {
            continue;
        }

        $computed = $iteratee($value);

        if (!isset($result[$computed])) {
            $result[$computed] = 0;
        };

        $result[$computed]++;
    }

    return $result;
}