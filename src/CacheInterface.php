<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

interface CacheInterface
{
    public function set($key, $value): self;

    public function get($key);

    public function has($key): bool;

    public function clear();

    public function delete($key);

    public function getSize();
}
