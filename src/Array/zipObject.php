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
 * This method is like `fromPairs` except that it accepts two arrays,
 * one of property identifiers and one of corresponding values.
 *
 * @category Array
 *
 * @param array $props  The property identifiers.
 * @param array $values The property values.
 *
 * @return object the new object.
 *
 * @example
 * <code>
 * zipObject(['a', 'b'], [1, 2])
 * /* => object(stdClass)#210 (2) {
 * ["a"] => int(1)
 * ["b"] => int(2)
 * }
 * *\/
 * </code>
 */
function zipObject(array $props = [], array $values = [])
{
    $result = new \stdClass;
    $index = -1;
    $length = \count($props);
    $props = \array_values($props);
    $values = \array_values($values);

    while (++$index < $length) {
        $value = $values[$index] ?? null;
        $result->{$props[$index]} = $value;
    }

    return $result;
}
