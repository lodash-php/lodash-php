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

/**
 * Creates a flattened array of values by running each element in `collection`
 * through `iteratee` and flattening the mapped results. The iteratee is invoked
 * with three arguments: (value, index|key, collection).
 *
 * @category Collection
 *
 * @param iterable $collection The collection to iterate over.
 * @param callable $iteratee The function invoked per iteration.
 *
 * @return array the new flattened array.
 *
 * @example
 * <code>
 * function duplicate($n) {
 *   return [$n, $n]
 * }
 *
 * flatMap([1, 2], 'duplicate')
 * // => [1, 1, 2, 2]
 * </code>
 */
function flatMap(iterable $collection, callable $iteratee): array
{
    return baseFlatten(map($collection, $iteratee), 1);
}
