<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

/**
 * Attempts to invoke `func`, returning either the result or the caught error
 * object. Any additional arguments are provided to `func` when it's invoked.
 *
 * @category Util
 *
 * @param callable $func The function to attempt.
 * @param array<int, mixed>  $args The arguments to invoke `func` with.
 *
 * @return mixed|\Throwable Returns the `func` result or error object.
 *
 * @example
 * <code>
 * // Avoid throwing errors for invalid PDO data source.
 * $elements = attempt(function () {
 *    new \PDO(null);
 * });
 *
 * if (isError($elements)) {
 *   $elements = [];
 * }
 * </code>s
 */
function attempt(callable $func, ...$args)
{
    try {
        return $func(...$args);
    } catch (\ParseError | \Error | \Throwable | \SoapFault | \DOMException | \PDOException $e) {
        return $e;
    }
}
