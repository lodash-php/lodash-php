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
 * Creates a `lodash` wrapper instance that wraps `value` with explicit method
 * chain sequences enabled. The result of such sequences must be unwrapped
 * with `->value()`.
 *
 * @category Seq
 *
 * @param mixed $value The value to wrap.
 *
 * @return \_ Returns the new `lodash` wrapper instance.
 * @example
 * <code>
 * $users = [
 *   ['user' => 'barney',  'age' => 36],
 *   ['user' => 'fred',    'age' => 40],
 *   ['user' => 'pebbles', 'age' => 1 ],
 * ];
 *
 * $youngest = chain($users)
 *   ->sortBy('age')
 *   ->map(function($o) {
 *     return $o['user'] . ' is ' . $o['age'];
 *   })
 *   ->head()
 *   ->value();
 * // => 'pebbles is 1'
 * </code>
 */
function chain($value): \_
{
    /** @var \_ $result */
    $result = __($value);
    $result->__chain__ = true;

    return $result;
}
