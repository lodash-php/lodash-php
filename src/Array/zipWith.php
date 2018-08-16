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
 * This method is like `zip` except that it accepts `iteratee` to specify
 * how grouped values should be combined. The iteratee is invoked with the
 * elements of each group: (...group).
 *
 * @category Array
 *
 * @param array<int, array|callable>  ...$arrays   The arrays to process.
 * @param callable $iteratee The function to combine grouped values.
 *
 * @return array the new array of grouped elements.
 *
 * @example
 * <code>
 * zipWith([1, 2], [10, 20], [100, 200], function($a, $b, $c) { return $a + $b + $c; })
 * // => [111, 222]
 * </code>
 */
function zipWith(...$arrays): array
{
    /** @var callable|null $iteratee */
    $iteratee = \is_callable(\end($arrays)) ? \array_pop($arrays) : null;

    return unzipWith($arrays, $iteratee);
}
