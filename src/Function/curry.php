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
 * Creates a function that accepts arguments of `func` and either invokes
 * `func` returning its result, if at least `arity` number of arguments have
 * been provided, or returns a function that accepts the remaining `func`
 * arguments, and so on. The arity of `func` may be specified if `func.length`
 * is not sufficient.
 *
 * The `_.curry.placeholder` value, which defaults to `_` in monolithic builds,
 * may be used as a placeholder for provided arguments.
 *
 * **Note:** This method doesn't set the "length" property of curried functions.
 *
 * @category Function
 *
 * @param callable $func  The function to curry.
 * @param int|null $arity The arity of `func`.
 *
 * @return callable Returns the new curried function.
 * @example
 * <code>
 * $abc = function($a, $b, $c) {
 *   return [$a, $b, $c];
 * };
 *
 * $curried = curry($abc);
 *
 * $curried(1)(2)(3);
 * // => [1, 2, 3]
 *
 * $curried(1, 2)(3);
 * // => [1, 2, 3]
 *
 * $curried(1, 2, 3);
 * // => [1, 2, 3]
 *
 * // Curried with placeholders.
 * $curried(1)(_, 3)(2);
 * // => [1, 2, 3]
 * </code>
 */
function curry(callable $func, ?int $arity = null)
{
    $curry = function ($arguments) use ($func, &$curry, $arity) {
        $requiredArguments = (new \ReflectionFunction($func))->getNumberOfParameters();
        $arity = $arity ?? $requiredArguments;

        return function (...$args) use ($func, $arguments, $curry, $arity) {
            if (false !== \array_search(_, $arguments)) {
                foreach ($arguments as $i => $argument) {
                    if (_ !== $argument) {
                        continue;
                    }

                    $arguments[$i] = current($args);
                    next($args);
                }
            } else {
                $arguments = \array_merge($arguments, $args);
            }

            if ($arity <= \count(\array_filter($arguments, function ($value) {
                return _ !== $value;
            }))) {
                return $func(...$arguments);
            }

            return $curry($arguments);
        };
    };

    return $curry([]);
}
