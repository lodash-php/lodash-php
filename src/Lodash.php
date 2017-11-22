<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

final class _
{
    public const reInterpolate = '<%=([\s\S]+?)%>';
    public const reEvaluate = "<%([\s\S]+?)%>";
    public const reEscape = "<%-([\s\S]+?)%>";

    public static $templateSettings = [

        /**
         * Used to detect `data` property values to be HTML-escaped.
         */
        'escape' => self::reEscape,

        /**
         * Used to detect code to be evaluated.
         */
        'evaluate' => self::reEvaluate,

        /**
         * Used to detect `data` property values to inject.
         */
        'interpolate' => self::reInterpolate,

        /**
         * Used to import functions or classes into the compiled template.
         */
        'imports' => [

            /**
             * A reference to the `lodash` escape function.
             */
            '_\escape' => '__e',
        ],
    ];
}