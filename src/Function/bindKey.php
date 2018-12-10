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
 * Creates a function that invokes the method `$function` of `$object` with `$partials`
 * prepended to the arguments it receives.
 *
 * This method differs from `bind` by allowing bound functions to reference
 * methods that may be redefined or don't yet exist
 *
 * @category Function
 *
 * @param object            $object   The object to invoke the method on.
 * @param string            $function The name of the method.
 * @param array<int, mixed> $partials The arguments to be partially applied.
 *
 * @return callable Returns the new bound function.
 * @example
 * <code>
 * $object = new class {
 *     private $user = 'fred';
 *     function greet($greeting, $punctuation) {
 *         return $greeting.' '.$this->user.$punctuation;
 *     }
 * };
 *
 * $bound = bindKey($object, 'greet', 'hi');
 * $bound('!');
 * // => 'hi fred!'
 * </code>
 */
function bindKey($object, string $function, ...$partials): callable
{
    return function (...$args) use ($object, $function, $partials) {
        $function = \Closure::fromCallable([$object, $function])->bindTo($object, get_class($object));

        return $function(...array_merge($partials, $args));
    };
}
