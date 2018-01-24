<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

use function _\memoize;

function memoizeCapped(callable $func)
{
    $MaxMemoizeSize = 500;
    $result = memoize($func, function ($key) use ($MaxMemoizeSize) {
        if ($this->cache->getSize() === $MaxMemoizeSize) {
            $this->cache->clear();
        }

        return $key;
    });

    return $result;
}
