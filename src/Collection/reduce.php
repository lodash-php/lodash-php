<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseIteratee;

/**
 * Reduces `collection` to a value which is the accumulated result of running
 * each element in `collection` thru `iteratee`, where each successive
 * invocation is supplied the return value of the previous. If `accumulator`
 * is not given, the first element of `collection` is used as the initial
 * value. The iteratee is invoked with four arguments:
 * (accumulator, value, index|key, collection).
 *
 * Many lodash methods are guarded to work as iteratees for methods like
 * `reduce`, `reduceRight`, and `transform`.
 *
 * The guarded methods are:
 * `assign`, `defaults`, `defaultsDeep`, `includes`, `merge`, `orderBy`,
 * and `sortBy`
 *
 * @category Collection
 *
 * @param iterable $collection  The collection to iterate over.
 * @param mixed    $iteratee    The function invoked per iteration.
 * @param mixed    $accumulator The initial value.
 *
 * @return mixed Returns the accumulated value.
 *
 * @example
 * <code>
 * reduce([1, 2], function($sum, $n) { return $sum + $n; }, 0)
 * // => 3
 *
 * reduce(['a' => 1, 'b' => 2, 'c' => 1], function ($result, $value, $key) {
 *     if (!isset($result[$value])) {
 *         $result[$value] = [];
 *     }
 *     $result[$value][] = $key;
 *
 *     return $result;
 *  }, [])
 * // => ['1' => ['a', 'c'], '2' => ['b']] (iteration order is not guaranteed)
 * </code>
 */
function reduce(iterable $collection, $iteratee, $accumulator = null)
{
    $func = function (iterable $array, $iteratee, $accumulator, $initAccum = null) {
        $length = \count(\is_array($array) ? $array : \iterator_to_array($array));

        if ($initAccum && $length) {
            $accumulator = \current($array);
        }
        foreach ($array as $key => $value) {
            $accumulator = $iteratee($accumulator, $value, $key, $array);
        }

        return $accumulator;
    };

    return $func($collection, baseIteratee($iteratee), $accumulator, null === $accumulator);
}
