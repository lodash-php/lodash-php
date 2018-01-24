<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function castPath($value, $object): array
{
    if (\is_array($value)) {
        return $value;
    }

    return isKey($value, $object) ? [$value] : stringToPath((string) $value);
}
