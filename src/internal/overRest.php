<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function overRest(callable $func, $start, callable $transform): callable
{
    $parameters = (new \ReflectionFunction($func))->getNumberOfParameters();
    $start = max($start ?? $parameters - 1, 0);

    return function () use ($func, $start, $transform) {
        $args = \func_get_args();
        $index = -1;
        $length = \max(\count($args) - $start, 0);
        $array = [];

        while (++$index < $length) {
            $array[$index] = $args[$start + $index];
        }
        $index = -1;
        $otherArgs = [];
        while (++$index < $start) {
            $otherArgs[$index] = $args[$index];
        }
        $otherArgs[$start] = $transform($array);

        return $func(...$otherArgs);
    };
}
