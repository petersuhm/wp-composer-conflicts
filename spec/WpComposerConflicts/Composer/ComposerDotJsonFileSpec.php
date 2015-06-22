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
                'some-vendor/some-dependency' => '1.0.0')
            )
        );
    }
}
