<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _;

use _\internal\Traits\CacheDataTrait;

/**
 * @property array $__data__
 * @property int   $size
 */
final class MapCache implements CacheInterface
{
    use CacheDataTrait;

    public function __construct(iterable $entries = null)
    {
        $this->clear();

        if (null !== $entries) {
            foreach ($entries as $key => $entry) {
                $this->set($key, $entry);
            }
        }
    }

    final public function set($key, $value): CacheInterface
    {
        $data = $this->getMapData($key);
        $size = $data->getSize();

        $data->set($key, $value);
        $this->size += $data->getSize() === $size ? 0 : 1;

        return $this;
    }

    final public function get($key)
    {
        return $this->getMapData($key)->get($key);
    }

    final public function has($key): bool
    {
        return $this->getMapData($key)->has($key);
    }

    final public function clear()
    {
        $this->size = 0;
        $this->__data__ = [
            'hash' => new Hash,
            'map' => new ListCache,
            'string' => new Hash,
        ];
    }

    final public function delete($key)
    {
        $result = $this->getMapData($key)->delete($key);
        $this->size -= $result ? 1 : 0;

        return $result;
    }

    private function isKey($key)
    {
        return \is_scalar($key);
    }

    private function getMapData($key): CacheInterface
    {
        if ($this->isKey($key)) {
            return $this->__data__[\is_string($key) ? 'string' : 'hash'];
        }

        return $this->__data__['map'];
    }
}
