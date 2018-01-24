<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2018
 */

namespace _\internal;

const reLeadingDot = '/^\./';
const rePropName = '#[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["\'])((?:(?!\2)[^\\\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))#';

/** Used to match backslashes in property paths. */
const reEscapeChar = '/\\(\\)?/g';

function stringToPath(...$args)
{
    return memoizeCapped(function ($string) {
        $result = [];
        if (\preg_match(reLeadingDot, $string)) {
            $result[] = '';
        }

        \preg_match_all(rePropName, $string, $matches, PREG_SPLIT_DELIM_CAPTURE);

        foreach ($matches as $match) {
            $result[] = $match[1] ?? $match[0];
        }

        return $result;
    })(...$args);
}
