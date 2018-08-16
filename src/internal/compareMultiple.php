<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

function compareMultiple($object, $other, $orders)
{
    $index = -1;
    $objCriteria = $object['criteria'];
    $othCriteria = $other['criteria'];
    $length = \count($objCriteria);
    $ordersLength = \count($orders);

    while (++$index < $length) {
        $result = $objCriteria[$index] <=> $othCriteria[$index];
        if ($result) {
            if ($index >= $ordersLength) {
                return $result;
            }
            $order = $orders[$index];

            return $result * ('desc' === $order ? -1 : 1);
        }
    }

    return $object['index'] - $other['index'];
}
