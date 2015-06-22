<?php

namespace spec\WpComposerConflicts;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PluginSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WpComposerConflicts\Plugin');
        $this->init()->shouldReturn(null);
    }
}
