<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _;

use function _\internal\baseIteratee;

/**
 * This method is like `max` except that it accepts `iteratee` which is
 * invoked for each element in `array` to generate the criterion by which
 * the value is ranked. The iteratee is invoked with one argument: (value).
 *
 * @category Math
 *
 * @param array           $array    The array to iterate over.
 * @param callable|string $iteratee The iteratee invoked per element.
 *
 * @return mixed Returns the maximum value.
 * @example
 * <code>
 * $objects = [['n' => 1], ['n' => 2]];
 *
 * maxBy($objects, function($o) { return $o['n']; });
 * // => ['n' => 2]
 *
 * // The `property` iteratee shorthand.
 * maxBy($objects, 'n');
 * // => ['n' => 2]
 * </code>
 */
function maxBy(?array $array, $iteratee)
{
    $iteratee = baseIteratee($iteratee);
    $result = null;
    $computed = null;

    foreach ($array as $key => $value) {
        $current = $iteratee($value);

        if (null !== $current && (null === $computed ? ($current === $current) : $current > $computed)) {
            $computed = $current;
            $result = $value;
        }
    }

    return $result;
}
