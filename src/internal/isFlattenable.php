<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

/**
 * Checks if `value` is a flattenable `arguments` object or array.
 *
 * @private
 *
 * @param mixed $value The value to check.
 *
 * @return boolean Returns `true` if `value` is flattenable, else `false`.
 */
function isFlattenable($value): bool
{
    return \is_array($value) && ([] === $value || \range(0, \count($value) - 1) === \array_keys($value));
}
