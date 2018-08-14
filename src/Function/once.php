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
 * Creates a function that is restricted to invoking `func` once. Repeat calls
 * to the function return the value of the first invocation. The `func` is
 * invoked with the arguments of the created function.
 *
 * @category Function
 *
 * @param callable $func The function to restrict.
 *
 * @return callable the new restricted function.
 *
 * @example
 * <code>
 * $initialize = once('createApplication');
 * $initialize();
 * $initialize();
 * // => `createApplication` is invoked once
 * </code>
 */
function once(callable $func): callable
{
    return before(2, $func);
}
