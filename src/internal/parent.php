<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

use function _\{slice, get};

function parent($object, $path)
{
    return count($path) < 2 ? $object : get($object, slice($path, 0, -1));
}