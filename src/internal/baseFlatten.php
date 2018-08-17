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
 * The base implementation of `flatten` with support for restricting flattening.
 *
 * @private
 *
 * @param array|null    $array     The array to flatten.
 * @param int           $depth     The maximum recursion depth.
 * @param callable|null $predicate The function invoked per iteration [isFlattenable].
 * @param bool|null     $isStrict  Restrict to values that pass `predicate` checks.
 * @param array|null    $result    The initial result value.
 *
 * @return array Returns the new flattened array.
 */
function baseFlatten(?array $array, int $depth, callable $predicate = null, bool $isStrict = null, array $result = null): array
{
    $result = $result ?? [];

    if ($array === null) {
        return $result;
    }

    $predicate = $predicate ?? '_\internal\isFlattenable';

    foreach ($array as $value) {
        if ($depth > 0 && $predicate($value)) {
            if ($depth > 1) {
                // Recursively flatten arrays (susceptible to call stack limits).
                $result = baseFlatten($value, $depth - 1, $predicate, $isStrict, $result);
            } else {
                arrayPush($result, $value);
            }
        } elseif (!$isStrict) {
            $result[\count($result)] = $value;
        }
    }

    return $result;
}
