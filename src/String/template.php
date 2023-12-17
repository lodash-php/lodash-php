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
 * Used to match
 * [ES template delimiters](http://ecma-international.org/ecma-262/7.0/#sec-template-literal-lexical-components).
 */
const reEsTemplate = "\$\{([^\\}]*(?:\\.[^\\}]*)*)\}";

/** Used to ensure capturing order of template delimiters. */
const reNoMatch = '($^)';

/** Used to match unescaped characters in compiled string literals. */
const reUnescapedString = "#([\'\n\r\x{2028}\x{2029}\\\])#u";

/** Used to escape characters for inclusion in compiled string literals. */
const stringEscapes = [
    '\\' => '',
    '\n' => 'n',
    '\r' => 'r',
    '\u2028' => 'u2028',
    '\u2029' => 'u2029',
];

/**
 * Creates a compiled template function that can interpolate data properties
 * in "interpolate" delimiters, HTML-escape interpolated data properties in
 * "escape" delimiters, and execute PHP in "evaluate" delimiters. Data
 * properties may be accessed as free variables in the template. If a setting
 * object is given, it takes precedence over `$templateSettings` values.
 *
 * @category String
 *
 * @param string $string  The template string.
 * @param array  $options The options array.
 *                        RegExp $options['escape'] = _::$templateSettings['escape'] The HTML "escape" delimiter.
 *                        RegExp $options['evaluate'] = _::$templateSettings['evaluate'] The "evaluate" delimiter.
 *                        array  $options['imports'] = _::$templateSettings['imports'] An object to import into the template as free variables.
 *                        RegExp $options['interpolate'] = _::$templateSettings['interpolate'] The "interpolate" delimiter.
 *
 * @return callable Returns the compiled template function.
 *
 * @example
 * <code>
 * // Use the "interpolate" delimiter to create a compiled template.
 * $compiled = template('hello <%= user %>!')
 * $compiled([ 'user' => 'fred' ])
 * // => 'hello fred!'
 *
 * // Use the HTML "escape" delimiter to escape data property values.
 * $compiled = template('<b><%- value %></b>')
 * $compiled([ 'value' => '<script>' ])
 * // => '<b>&lt;script&gt;</b>'
 *
 * // Use the "evaluate" delimiter to execute JavaScript and generate HTML.
 * $compiled = template('<% foreach($users as $user) { %><li><%- user %></li><% }%>')
 * $compiled([ 'users' => ['fred', 'barney'] ])
 * // => '<li>fred</li><li>barney</li>'
 *
 * // Use the internal `print` function in "evaluate" delimiters.
 * $compiled = template('<% print("hello " + $user)%>!')
 * $compiled([ 'user' => 'barney' ])
 * // => 'hello barney!'
 *
 * // Use backslashes to treat delimiters as plain text.
 * $compiled = template('<%= "\\<%- value %\\>" %>')
 * $compiled([ 'value' => 'ignored' ])
 * // => '<%- value %>'
 *
 * // Use the `imports` option to import functions or classes with aliases.
 * $text = '<% all($users, function($user) { %><li><%- user %></li><% })%>'
 * $compiled = template($text, { 'imports': { '_\each': 'all' } })
 * $compiled([ 'users' => ['fred', 'barney'] ])
 * // => '<li>fred</li><li>barney</li>'
 *
 * // Use custom template delimiters.
 * \_::$templateSettings['interpolate'] = '{{([\s\S]+?)}}'
 * $compiled = template('hello {{ user }}!')
 * $compiled([ 'user' => 'mustache' ])
 * // => 'hello mustache!'
 *
 * // Use the `source` property to access the compiled source of the template
 * template($mainText)->source;
 * </code>
 */
function template(string $string, array $options = []): callable
{
    $options = \array_merge_recursive(\_::$templateSettings, $options);

    $interpolate = $options['interpolate'] ?? reNoMatch;

    $reDelimiters = \implode('|', [
        ($options['escape'] ?? reNoMatch),
        ($interpolate === \_::reInterpolate ? reEsTemplate : reNoMatch),
        $interpolate,
        ($options['evaluate'] ?? reNoMatch),
    ]);

    $string = \preg_replace_callback('#'.$reDelimiters.'#u', function ($matches) {
        [,
            $escapeValue,
            $interpolateValue,
            $esTemplateValue,
            $evaluateValue,
            ] = \array_merge($matches, \array_fill(\count($matches), 5 - \count($matches), null));

        $interpolateValue = $interpolateValue ?: $esTemplateValue;

        $source = '';

        if ($escapeValue) {
            $escapeValue = \trim($escapeValue);
            $source .= "<?=__e(\${$escapeValue});?>";
        }

        if ($evaluateValue) {
            $source .= "<?php \n{$evaluateValue} ?>";
        }

        if ($interpolateValue) {
            $interpolateValue = \trim($interpolateValue);
            $interpolateValue = \preg_replace('#^([\p{L}\p{N}_]+)$#u', '$$1', $interpolateValue);
            $source .= "<?={$interpolateValue};?>";
        }

        return $source;
    }, $string);

    $string = \preg_replace_callback(reUnescapedString, function ($chr) {
        return stringEscapes[$chr[0]] ?? $chr[0];
    }, $string);

    $imports = $options['imports'] ?? [];

    return new class($string, $imports) {
        public $source;

        /**
         * @var array<string, string>
         */
        private $imports;

        /**
         * @param array<string, string> $imports
         */
        public function __construct(string $source, array $imports)
        {
            $this->source = $source;
            $this->imports = $imports;
        }

        public function __invoke(array $arguments = [])
        {
            $imports = '';

            foreach ($this->imports as $import => $alias) {
                if (\class_exists($import)) {
                    $imports .= "use $import as $alias;";
                } elseif (\function_exists($import)) {
                    $imports .= "use function $import as $alias;";
                }
            }

            /** @var string $file */
            $file = \tempnam(\sys_get_temp_dir(), 'lodashphp');

            if (!$file) {
                throw new \RuntimeException('Unable to create temporary file for template');
            }

            \file_put_contents($file, "<?php namespace __template; $imports (function() { extract(".\var_export($arguments, true).'); ?>'.$this->source.'<?php })()?>');

            $content = attempt(function () use ($file) {
                \ob_start();
                require_once $file;

                return \ob_get_clean();
            });

            \unlink($file);

            return $content;
        }
    };
}
