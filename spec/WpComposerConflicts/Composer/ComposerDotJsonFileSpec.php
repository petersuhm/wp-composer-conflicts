<?php

namespace spec\WpComposerConflicts\Composer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComposerDotJsonFileSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromFilePath', array(__DIR__ . '/../../wp-content/plugins/dummy-plugin-one/composer.json'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WpComposerConflicts\Composer\ComposerDotJsonFile');
        $this->getContent()->shouldReturn(array(
            'require' => array(
                'some-vendor/some-dependency' => '1.0.0',
                'another-vendor/another-dependency' => '1.5.0',
            )
        ));
    }

    function it_gets_the_file_path()
    {
        $this->getFilePath()->shouldReturn(__DIR__ . '/../../wp-content/plugins/dummy-plugin-one/composer.json');
    }

    function it_lists_dependencies()
    {
        $this->getDependencies()->shouldReturn(array(
            'some-vendor/some-dependency' => '1.0.0',
            'another-vendor/another-dependency' => '1.5.0',
        ));
    }
}
