<?php

namespace spec\WpComposerConflicts;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WpComposerConflicts\Composer\ComposerDotJsonFile;

class ComposerDependencyScannerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WpComposerConflicts\ComposerDependencyScanner');
    }

    function it_finds_all_composer_json_files()
    {
        $expected = array(
            ComposerDotJsonFile::fromFilePath(__DIR__ . '/../wp-content/plugins/dummy-plugin-one/composer.json'),
            ComposerDotJsonFile::fromFilePath(__DIR__ . '/../wp-content/plugins/dummy-plugin-two/composer.json'),
        );

        $this
            ->composerDotJsonFiles(__DIR__ . '/../wp-content/plugins/')
            ->shouldBeLike($expected);
    }
}
