<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function createMathOperation(callable $operator, $defaultValue)
{
    return function ($value, $other) use ($defaultValue, $operator) {
        if (null === $value && null === $other) {
            return $defaultValue;
        }

        $result = null;

        if (null !== $value) {
            $result = $value;
        }

        if (null !== $other) {
            if (null === $result) {
                return $other;
            }

            $result = $operator($value, $other);
        }

        return $result;
    };
}
