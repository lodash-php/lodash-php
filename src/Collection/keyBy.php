<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\createAggregator;

/**
 * Creates an object composed of keys generated from the results of running
 * each element of `collection` through `iteratee`. The corresponding value of
 * each key is the last element responsible for generating the key. The
 * iteratee is invoked with one argument: (value).
 *
 * @category Collection
 *
 * @param iterable $collection The collection to iterate over.
 * @param callable $iteratee   The iteratee to transform keys.
 *
 * @return array the composed aggregate object.
 * @example
 * <code>
 * $array = [
 *   ['direction' => 'left', 'code' => 97],
 *   ['direction' => 'right', 'code' => 100],
 * ];
 *
 * keyBy($array, function ($o) { return \chr($o['code']); })
 * // => ['a' => ['direction' => 'left', 'code' => 97], 'd' => ['direction' => 'right', 'code' => 100]]
 *
 * keyBy($array, 'direction');
 * // => ['left' => ['direction' => 'left', 'code' => 97], 'right' => ['direction' => 'right', 'code' => 100]]
 * </code>
 */
function keyBy(iterable $collection, $iteratee): array
{
    return createAggregator(function ($result, $value, $key) {
        $result[$key] = $value;

        return $result;
    })($collection, $iteratee);
}
