<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\baseSet;

/**
 * This method is like `zipObject` except that it supports property paths.
 *
 * @category Array
 *
 * @param array $props  The property identifiers.
 * @param array $values The property values.
 *
 * @return \stdClass the new object.
 *
 * @example
 * <code>
 * zipObjectDeep(['a.b[0].c', 'a.b[1].d'], [1, 2])
 * /* => class stdClass#20 (1) {
 *  public $a => class stdClass#19 (1) {
 *      public $b =>
 *          array(2) {
 *              [0] => class stdClass#17 (1) {
 *                      public $c => int(1)
 *                  }
 *             [1] => class stdClass#18 (1) {
 *                  public $d => int(2)
 *                  }
 *          }
 *      }
 *  }
 * *\/
 * </code>
 */
function zipObjectDeep(array $props = [], array $values = []): \stdClass
{
    $result = new \stdClass;
    $index = -1;
    $length = \count($props);
    $props = \array_values($props);
    $values = \array_values($values);

    while (++$index < $length) {
        $value = $values[$index] ?? null;
        baseSet($result, $props[$index], $value);
    }

    return $result;
}
