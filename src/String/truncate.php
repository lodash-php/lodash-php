<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

use function _\internal\castSlice;
use function _\internal\hasUnicode;
use function _\internal\stringSize;
use function _\internal\stringToArray;

/** Used as default options for `truncate`. */
const DEFAULT_TRUNC_LENGTH = 30;
const DEFAULT_TRUNC_OMISSION = '...';

/**
 * Truncates `string` if it's longer than the given maximum string length.
 * The last characters of the truncated string are replaced with the omission
 * string which defaults to "...".
 *
 * @category String
 *
 * @param    string $string The string to truncate.
 * @param    array $options The options object.
 *                           length = 30 The maximum string length.
 *                           omission = '...' The string to indicate text is omitted.
 *                           separator The separator pattern to truncate to.
 *
 * @return string Returns the truncated string.
 *
 * @example
 * <code>
 * truncate('hi-diddly-ho there, neighborino')
 * // => 'hi-diddly-ho there, neighbo...'
 *
 * truncate('hi-diddly-ho there, neighborino', [
 *   'length' => 24,
 *   'separator' => ' '
 * ])
 * // => 'hi-diddly-ho there,...'
 *
 * truncate('hi-diddly-ho there, neighborino', [
 *   'length' => 24,
 *   'separator' => '/,? +/'
 * ])
 * // => 'hi-diddly-ho there...'
 *
 * truncate('hi-diddly-ho there, neighborino', [
 *   'omission' => ' [...]'
 * ])
 * // => 'hi-diddly-ho there, neig [...]'
 * </code>
 */
function truncate($string, array $options = [])
{
    $separator = $options['separator'] ?? null;
    $length = $options['length'] ?? DEFAULT_TRUNC_LENGTH;
    $omission = $options['omission'] ?? DEFAULT_TRUNC_OMISSION;

    $strSymbols = null;
    $strLength = \strlen($string);
    if (hasUnicode($string)) {
        $strSymbols = stringToArray($string);
        $strLength = \count($strSymbols);
    }
    if ($length >= $strLength) {
        return $string;
    }

    $end = $length - stringSize($omission);
    if ($end < 1) {
        return $omission;
    }

    $result = $strSymbols
        ? \implode('', castSlice($strSymbols, 0, $end))
        : \substr($string, 0, $end);

    if (null === $separator) {
        return $result.$omission;
    }

    if ($strSymbols) {
        $end += \strlen($result) - $end;
    }

    if (\preg_match(reRegExpChar, $separator)) {
        if (\preg_match($separator, \substr($string, 0, $end))) {
            $match = null;
            $newEnd = null;
            $substring = $result;

            if (\preg_match_all($separator, $substring, $match, PREG_OFFSET_CAPTURE)) {
                $newEnd = \end($match[0])[1];
            }

            $result = \substr($result, 0, $newEnd ?? $end);
        }
    } elseif (\strpos($string, $separator) !== $end) {
        $index = \strrpos($result, $separator);
        if (false !== $index) {
            $result = \substr($result, 0, $index);
        }
    }

    return $result.$omission;
}
