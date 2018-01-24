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
 * This method returns the first argument it receives.
 *
 * @category Util
 *
 * @param mixed $value Any value.
 *
 * @return mixed Returns `value`.
 * @example
 * <code>
 * $object = ['a' => 1];
 *
 * identity($object) === $object;
 * // => true
 * </code>
 */
function identity($value = null)
{
    return $value;
}
