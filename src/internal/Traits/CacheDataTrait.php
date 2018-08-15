<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal\Traits;

trait CacheDataTrait
{
    private $__data__ = [];

    private $size;

    public function getSize(): int
    {
        return $this->size;
    }
}
