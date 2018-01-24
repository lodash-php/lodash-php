<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseUniq;

/**
 * This method is like `uniq` except that it accepts `comparator` which
 * is invoked to compare elements of `array`. The order of result values is
 * determined by the order they occur in the array.The comparator is invoked
 * with two arguments: (arrVal, othVal).
 *
 * @category Array
 *
 * @param array    $array      The array to inspect.
 * @param callable $comparator The comparator invoked per element.
 *
 * @return array the new duplicate free array.
 * @example
 * <code>
 * $objects = [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1], ['x' => 1, 'y' => 2]]
 *
 * uniqWith($objects, '_::isEqual')
 * // => [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1]]
 * </code>
 */
function uniqWith(array $array, callable $comparator): array
{
    return baseUniq($array, null, $comparator);
}
