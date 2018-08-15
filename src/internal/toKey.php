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
 * Converts `value` to a string key if it's not a string.
 *
 * @param mixed $value The value to inspect.
 *
 * @return string Returns the key.
 */
function toKey($value): string
{
    if (\is_string($value)) {
        return $value;
    }

    $result = (string) $value;

    return ('0' === $result && (1 / $value) === -INF) ? '-0' : $result;
}
