<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _;

/**
 * Creates a function that memoizes the result of `func`. If `resolver` is
 * provided, it determines the cache key for storing the result based on the
 * arguments provided to the memoized function. By default, the first argument
 * provided to the memoized function is used as the map cache key
 *
 * **Note:** The cache is exposed as the `cache` property on the memoized
 * function. Its creation may be customized by replacing the `_.memoize.Cache`
 * constructor with one whose instances implement the
 * [`Map`](http://ecma-international.org/ecma-262/7.0/#sec-properties-of-the-map-prototype-object)
 * method interface of `clear`, `delete`, `get`, `has`, and `set`.
 *
 * @category Function
 *
 * @param callable      $func     The function to have its output memoized.
 * @param callable|null $resolver The function to resolve the cache key.
 *
 * @return callable Returns the new memoized function.
 *
 * @example
 * <code>
 * $object = ['a' => 1, 'b' => 2];
 * $other = ['c' => 3, 'd' => 4];
 *
 * $values = memoize('_\values');
 * $values($object);
 * // => [1, 2]
 *
 * $values($other);
 * // => [3, 4]
 *
 * $object['a'] = 2;
 * $values($object);
 * // => [1, 2]
 *
 * // Modify the result cache.
 * $values->cache->set($object, ['a', 'b']);
 * $values($object);
 * // => ['a', 'b']
 * </code>
 */
function memoize(callable $func, callable $resolver = null)
{
    $memoized = new class($func, $resolver ?? null) {

        /**
         * @var CacheInterface
         */
        public $cache;

        private $resolver;

        private $func;

        public function __construct(callable $func, ?callable $resolver)
        {
            $this->resolver = $resolver;
            $this->func = $func;
        }

        public function __invoke()
        {
            $args = \func_get_args();

            if ($this->resolver) {
                $key = \Closure::fromCallable($this->resolver)->bindTo($this)(...$args);
            } else {
                $key = &$args[0];
            }

            $cache = $this->cache;

            if ($cache->has($key)) {
                return $cache->get($key);
            }

            $result = ($this->func)(...$args);
            $this->cache = $this->cache->set($key, $result);

            return $result;
        }
    };

    $memoized->cache = new MapCache;

    return $memoized;
}
