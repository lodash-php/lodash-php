<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */


$TEST_DIR = 'tests';

$TEST_TEMPLATE = <<<TEMPLATE
<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

use function _\{function};
use PHPUnit\Framework\TestCase;

class {functionUpper}Test extends TestCase
{
    public function test{functionUpper}()
    {
        \$this->assertSame(null, {function}());
    }
}
TEMPLATE;
;

/** @var \SplFileInfo $file */
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__.'/src', RecursiveDirectoryIterator::SKIP_DOTS)) as $file) {
    $dirname = dirname($file->getRealPath());
    $package = substr($dirname, strrpos($dirname, '/') + 1);

    if ('internal' === $package || 'src' === $package) {
        continue;
    }

    $functionName = $file->getBasename('.php');
    $functionUpper = ucfirst($file->getBasename('.php'));

    $testFile = "${TEST_DIR}/${package}/${functionUpper}Test.php";

    if (file_exists($testFile)) {
        continue;
    }

    file_put_contents($testFile, str_replace(['{function}', '{functionUpper}'], [$functionName, $functionUpper], $TEST_TEMPLATE));
}