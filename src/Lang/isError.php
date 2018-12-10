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
 * Checks if `value` is an `\Exception`, `\ParseError`, \Error`, \Throwable`, \SoapFault`, \DOMException`, \PDOException`, object.
 *
 * @category Lang
 *
 * @param   mixed $value The value to check.
 *
 * @return boolean Returns `true` if `value` is an error object, else `false`.
 *
 * @example
 * <code>
 * isError(new \Exception())
 * // => true
 *
 * isError(\Exception::Class)
 * // => false
 * </code>
 */
function isError($value): bool
{
    if (!\is_object($value)) {
        return false;
    }

    return $value instanceof \ParseError || $value instanceof \Error || $value instanceof \Throwable || $value instanceof \SoapFault || $value instanceof \DOMException || $value instanceof \PDOException;
}
