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
use function _\internal\baseUniq;

/**
 * This method is like `uniq` except that it accepts `iteratee` which is
 * invoked for each element in `array` to generate the criterion by which
 * uniqueness is computed. The order of result values is determined by the
 * order they occur in the array. The iteratee is invoked with one argument:
 * (value).
 *
 * @category Array
 *
 * @param array $array    The array to inspect.
 * @param mixed $iteratee The iteratee invoked per element.
 *
 * @return array the new duplicate free array.
 * @example
 * <code>
 * uniqBy([2.1, 1.2, 2.3], 'floor')
 * // => [2.1, 1.2]
 * </code>
 */
function uniqBy(array $array, $iteratee): array
{
    return baseUniq($array, baseIteratee($iteratee));
}
