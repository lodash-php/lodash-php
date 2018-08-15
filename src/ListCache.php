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
use function _\internal\assocIndexOf;

/**
 * @property array $__data__
 * @property int   $size
 */
final class ListCache implements CacheInterface
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
        $index = assocIndexOf($this->__data__, $key);

        if ($index < 0) {
            ++$this->size;
            $this->__data__[] = [$key, $value];
        } else {
            $this->__data__[$index][1] = $value;
        }

        return $this;
    }

    final public function get($key)
    {
        $index = assocIndexOf($this->__data__, $key);

        return $index < 0 ? null : $this->__data__[$index][1];
    }

    final public function has($key): bool
    {
        return assocIndexOf($this->__data__, $key) > -1;
    }

    final public function clear()
    {
        $this->__data__ = [];
        $this->size = 0;
    }

    final public function delete($key)
    {
        $index = assocIndexOf($this->__data__, $key);

        if ($index < 0) {
            return false;
        }

        $lastIndex = \count($this->__data__) - 1;
        if ($index === $lastIndex) {
            \array_pop($this->__data__);
        } else {
            \array_splice($this->__data__, $index, 1);
        }
        --$this->size;

        return true;
    }
}
