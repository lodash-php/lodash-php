<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->in('tests')
    ->notName('compiled.php');

return PhpCsFixer\Config::create()
    ->setRules(
        [
            '@PSR1' => true,
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
            'single_import_per_statement' => false,
        ]
    )
    ->setFinder($finder)
;
