<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

use function _\indexOf;

function arrayIncludes(?array $array, $value)
{
    return null !== $array && indexOf($array, $value, 0) > -1;
}
