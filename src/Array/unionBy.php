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
use function _\internal\baseIteratee;
use function _\internal\baseUniq;

/**
 * This method is like `union` except that it accepts `iteratee` which is
 * invoked for each element of each `arrays` to generate the criterion by
 * which uniqueness is computed. Result values are chosen from the first
 * array in which the value occurs. The iteratee is invoked with one argument:
 * (value).
 *
 * @category Array
 *
 * @param array<int, mixed>    ...$arrays The arrays to inspect.
 * @param callable $iteratee  The iteratee invoked per element.
 *
 * @return array the new array of combined values.
 *
 * @example
 * <code>
 * unionBy([2.1], [1.2, 2.3], 'floor')
 * // => [2.1, 1.2]
 *
 * // The `_::property` iteratee shorthand.
 * unionBy([['x' => 1]], [['x' => 2], ['x' => 1]], 'x');
 * // => [['x' => 1], ['x' => 2]]
 * </code>
 */
function unionBy(...$arrays): array
{
    return baseUniq(baseFlatten($arrays, 1, '\is_array', true), baseIteratee(\array_pop($arrays)));
}
