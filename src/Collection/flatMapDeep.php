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
 * This method is like `flatMap` except that it recursively flattens the
 * mapped results.
 *
 * @category Collection
 *
 * @param iterable $collection The collection to iterate over.
 * @param callable $iteratee The function invoked per iteration.
 *
 * @return array Returns the new flattened array.
 * @example
 * <code>
 * function duplicate($n) {
 *   return [[[$n, $n]]];
 * }
 *
 * flatMapDeep([1, 2], 'duplicate');
 * // => [1, 1, 2, 2]
 * </code>
 */
function flatMapDeep(iterable $collection, callable $iteratee): array
{
    return baseFlatten(map($collection, $iteratee), \PHP_INT_MAX);
}
