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
 * The inverse of `escape`this method converts the HTML entities
 * `&amp;`, `&lt;`, `&gt;`, `&quot;` and `&#39;` in `string` to
 * their corresponding characters.
 *
 * @category String
 *
 * @param string $string The string to unescape.
 *
 * @return string Returns the unescaped string.
 * @example
 * <code>
 * unescape('fred, barney, &amp; pebbles')
 * // => 'fred, barney, & pebbles'
 * </code>
 */
function unescape(string $string): string
{
    return \html_entity_decode($string);
}
