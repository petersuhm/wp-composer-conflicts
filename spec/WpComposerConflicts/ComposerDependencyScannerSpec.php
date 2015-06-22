<?php

namespace spec\WpComposerConflicts;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComposerDependencyScannerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WpComposerConflicts\ComposerDependencyScanner');
    }

    function it_finds_all_composer_json_files()
    {
        $this
            ->composerDotJsonFiles(__DIR__ . '/../wp-content/plugins/')
            ->shouldReturn(array(
                'dummy-plugin-one/composer.json',
                'dummy-plugin-two/composer.json'
            ));
    }
}
