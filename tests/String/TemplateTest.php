<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PHPUnit\Framework\TestCase;
use function _\template;

class TemplateTest extends TestCase
{
    public function testTemplate()
    {
        $compiled = template('hello <%= user %>!');
        $this->assertSame('hello fred!', $compiled(['user' => 'fred']));

        $compiled = template('<b><%- value %></b>');
        $this->assertSame('<b>&lt;script&gt;</b>', $compiled(['value' => '<script>']));

        $compiled = template('<% foreach ($users as $user) { %><li><%- user %></li><% }%>');
        $this->assertSame('<li>fred</li><li>barney</li>', $compiled(['users' => ['fred', 'barney']]));

        $compiled = template('<% print("hello " . $user)%>!');
        $this->assertSame('hello barney!', $compiled(['user' => 'barney']));

        $compiled = template('<%= "\<%- value %\>" %>');
        $this->assertSame('<%- value %>', $compiled(['value' => 'ignored']));

        $compiled = template('<% all($users, function($user) { %><li><%- user %></li><% })%>', ['imports' => ['_\each' => 'all']]);
        $this->assertSame('<li>fred</li><li>barney</li>', $compiled(['users' => ['fred', 'barney']]));

        $compiled = template('<% underscore::each($users, function($user) { %><li><%- user %></li><% })%>', ['imports' => ['_' => 'underscore']]);
        $this->assertSame('<li>fred</li><li>barney</li>', $compiled(['users' => ['fred', 'barney']]));

        \_::$templateSettings['interpolate'] = '{{([\s\S]+?)}}';

        $compiled = template('hello {{ user }}!');
        $this->assertSame('hello mustache!', $compiled(['user' => 'mustache']));
    }
}
