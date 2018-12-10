<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseRest;
use function _\internal\shortOut;

/**
 * Creates a function that invokes `func` with `partials` prepended to the
 * arguments it receives.
 *
 * @category Function
 *
 * @param callable          $func     The function to partially apply arguments to.
 * @param array<int, mixed> $partials The arguments to be partially applied.
 *
 * @return callable Returns the new partially applied function.
 *
 * @example
 * <code>
 * function greet($greeting, $name) {
 *   return $greeting . ' ' . $name;
 * }
 *
 * $sayHelloTo = partial('greet', 'hello');
 * $sayHelloTo('fred');
 * // => 'hello fred'
 * </code>
 */
function partial(callable $func, ...$partials): callable
{
    return baseRest(function ($func, $partials) {
        $wrapper = function () use ($func, $partials) {
            $arguments = \func_get_args();
            $argsIndex = -1;
            $argsLength = \func_num_args();
            $leftIndex = -1;
            $leftLength = \count($partials);
            $args = [];

            while (++$leftIndex < $leftLength) {
                $args[$leftIndex] = $partials[$leftIndex];
            }
            while ($argsLength--) {
                $args[$leftIndex++] = $arguments[++$argsIndex];
            }

            return $func(...$args);
        };

        return shortOut($wrapper);
    })($func, ...$partials);
}
