<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseFlatten;
use function _\internal\baseUniq;

/**
 * This method is like `union` except that it accepts `comparator` which
 * is invoked to compare elements of `arrays`. Result values are chosen from
 * the first array in which the value occurs. The comparator is invoked
 * with two arguments: (arrVal, othVal).
 *
 * @category Array
 *
 * @param array<int, mixed>    ...$arrays  The arrays to inspect.
 * @param callable $comparator The comparator invoked per element.
 *
 * @return array the new array of combined values.
 *
 * @throws \InvalidArgumentException
 *
 * @example
 * <code>
 * $objects = [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1]]
 * $others = [['x' => 1, 'y' => 1], ['x' => 1, 'y' => 2]]
 *
 * unionWith($objects, $others, '_::isEqual')
 * // => [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1], ['x' => 1, 'y' => 1]]
 * </code>
 */
function unionWith(... $arrays): array
{
    /** @var callable $comparator */
    $comparator = \array_pop($arrays);

    if (!\is_callable($comparator)) {
        throw new \InvalidArgumentException(__FUNCTION__.' expects the last value passed to be callable');
    }

    return baseUniq(baseFlatten($arrays, 1, '\is_array', true), null, $comparator);
}
