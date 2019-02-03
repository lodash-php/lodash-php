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
    public $__chain__ = false;

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

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic(string $method, array $args)
    {
        if (!\is_callable("_\\$method")) {
            throw new \InvalidArgumentException("Function _::$method is not valid");
        }

        return ("_\\$method")(...$args);
    }

    public function __call($method, $arguments)
    {
        $this->value = self::__callStatic($method, \array_merge([$this->value], $arguments));

        return $this;
    }

    public function value()
    {
        return $this->value;
    }
}

function lodash($value): _
{
    return new _($value);
}

// We can't use "_" as a function name, since it collides with the "_" function in the gettext extension
// Laravel uses a function __, so only register the alias if the function name is not in use
if (!function_exists('__')) {
    function __($value): _
    {
        return new _($value);
    }
}

if (!defined('_')) {
    define('_', _::class);
}
