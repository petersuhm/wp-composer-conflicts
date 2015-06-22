<?php

namespace WpComposerConflicts;

/**
 * Class Plugin
 * @package WpComposerConflicts
 */
class Plugin
{
    /**
     * Intialize plugin
     */
    public function init()
    {
        add_action('admin_init', function() {
            $scanner = new ComposerDependencyScanner();
            var_dump($scanner->composerDotJsonFiles(WP_PLUGIN_DIR)); die();
        });
    }
}
