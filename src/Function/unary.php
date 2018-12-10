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
 * Creates a function that accepts up to one argument, ignoring any
 * additional arguments.
 *
 * @category Function
 *
 * @param callable $func The function to cap arguments for.
 *
 * @return callable the new capped function.
 * @example
 * <code>
 * map(['6', '8', '10'], unary('intval'));
 * // => [6, 8, 10]
 * </code>
 */
function unary(callable $func): callable
{
    return ary($func, 1);
}
