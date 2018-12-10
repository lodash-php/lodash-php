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
 * Creates a function that invokes `func` with the `this` binding of `object`
 * and `partials` prepended to the arguments it receives.
 *
 * @category Function
 *
 * @param callable          $function The function to bind.
 * @param object|mixed      $object   The `object` binding of `func`.
 * @param array<int, mixed> $partials The arguments to be partially applied.
 *
 * @return callable Returns the new bound function.
 * @example
 * <code>
 * function greet($greeting, $punctuation) {
 *   return $greeting . ' ' . $this->user . $punctuation;
 * }
 *
 * $object = $object = new class {
 *     public $user = 'fred';
 * };
 *
 * $bound = bind('greet', $object, 'hi');
 * $bound('!');
 * // => 'hi fred!'
 * </code>
 */
function bind(callable $function, $object, ...$partials): callable
{
    return function (...$args) use ($object, $function, $partials) {
        $function = \Closure::fromCallable($function)->bindTo($object, $function instanceof \Closure ? $object : null);

        return $function(...array_merge($partials, $args));
    };
}
