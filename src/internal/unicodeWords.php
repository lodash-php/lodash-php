<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _\internal;

/**
 * Splits a Unicode `string` into an array of its words.
 *
 * @private
 *
 * @param string $string The string to inspect.
 *
 * @return array Returns the words of `string`.
 */
function unicodeWords(string $string): array
{
    $regex = '#'.\implode('|', [
            rsUpper.'?'.rsLower.'+'.rsOptContrLower.'(?='.\implode('|', [rsBreak, rsUpper, '$']).')',
            rsMiscUpper.'+'.rsOptContrUpper.'(?='.\implode('|', [rsBreak, rsUpper.rsMiscLower, '$']).')',
            rsUpper.'?'.rsMiscLower.'+'.rsOptContrLower,
            rsUpper.'+'.rsOptContrUpper,
            rsOrdUpper,
            rsOrdLower,
            rsDigits,
            rsEmoji,
        ]).'#u';

    if (\preg_match_all($regex, $string, $matches) > 0) {
        return $matches[0];
    }

    return [];
}
