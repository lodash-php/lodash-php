<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\ExplicitIndirectVariableFixer;
use PhpCsFixer\Fixer\LanguageConstruct\FunctionToConstantFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use PhpCsFixer\Fixer\StringNotation\ExplicitStringVariableFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __FILE__,
    ]);

    $ecsConfig->sets([
        SetList::PSR_12,
        SetList::SPACES,
        SetList::DOCBLOCK,
        SetList::COMMENTS,
        SetList::PHPUNIT,
        SetList::NAMESPACES,
        SetList::CLEAN_CODE,
    ]);

    $ecsConfig->rules([
        PhpUnitMethodCasingFixer::class,
        FunctionToConstantFixer::class,
        ExplicitStringVariableFixer::class,
        ExplicitIndirectVariableFixer::class,
        NewWithBracesFixer::class,
        StandardizeIncrementFixer::class,
        SelfAccessorFixer::class,
        MagicConstantCasingFixer::class,
        NoUselessElseFixer::class,
        SingleQuoteFixer::class,
        // VoidReturnFixer::class,
    ]);

    $header = <<<'EOF'
This file is part of the SolidWorx Lodash-PHP project.

@author     Pierre du Plessis <open-source@solidworx.co>
@copyright  Copyright (c) 2017
EOF;

    $ecsConfig->ruleWithConfiguration(SingleClassElementPerStatementFixer::class, ['elements' => ['const', 'property']]);
    $ecsConfig->ruleWithConfiguration(ClassDefinitionFixer::class, ['single_line' => \true]);
    $ecsConfig->ruleWithConfiguration(OrderedImportsFixer::class, ['imports_order' => ['const', 'class', 'function']]);
    $ecsConfig->ruleWithConfiguration(HeaderCommentFixer::class, [
        'comment_type' => 'comment',
        'header' => \trim($header),
        'location' => 'after_declare_strict',
        'separate' => 'both',
    ]);
};
