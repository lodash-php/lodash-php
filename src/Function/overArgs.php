<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\arrayMap;
use function _\internal\baseFlatten;
use function _\internal\baseRest;
use function _\internal\baseUnary;

/**
 * Creates a function that invokes `func` with its arguments transformed.
 *
 * @static
 * @memberOf _
 * @category Function
 *
 * @param callable   $func       The function to wrap.
 * @param callable[] $transforms The argument transforms.
 *
 * @return callable the new function.
 *
 * @example
 * <code>
 * function doubled($n) {
 *   return $n * 2;
 * }
 *
 * function square($n) {
 *   return $n * $n;
 * }
 *
 * $func = overArgs(function($x, $y) {
 *   return [$x, $y];
 * }, ['square', 'doubled']);
 *
 * $func(9, 3);
 * // => [81, 6]
 *
 * $func(10, 5);
 * // => [100, 10]
 * </code>
 */
function overArgs(callable $func, array $transforms): callable
{
    return baseRest(function ($func, $transforms) {
        $transforms = (\count($transforms) == 1 && \is_array($transforms[0]))
            ? arrayMap($transforms[0], baseUnary('\_\internal\baseIteratee'))
            : arrayMap(baseFlatten($transforms, 1), baseUnary('\_\internal\baseIteratee'));

        $funcsLength = \count($transforms);

        return baseRest(function ($args) use ($funcsLength, $transforms, $func) {
            $index = -1;
            $length = \min(\count($args), $funcsLength);

            while (++$index < $length) {
                $args[$index] = $transforms[$index]($args[$index]);
            }

            return $func(...$args);
        });
    })($func, $transforms);
}
