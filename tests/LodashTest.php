<?php

use PHPUnit\Framework\TestCase;

class LodashTest extends TestCase
{
    public function testChain()
    {
        $users = [
            ['user' => 'barney', 'age' => 36],
            ['user' => 'fred', 'age' => 40],
            ['user' => 'pebbles', 'age' => 1],
        ];

        $youngest = __($users)
            ->sortBy('age')
            ->map(function ($o) {
                return $o['user'] . ' is ' . $o['age'];
            })
            ->head()
            ->value();

        $this->assertSame('pebbles is 1', $youngest);
    }
}
