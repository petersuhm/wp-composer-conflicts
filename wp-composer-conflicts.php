<?php

/**
 * Plugin Name: WP Composer Conflicts
 * Plugin URI:
 * Description: Scans the composer.json files of your installed plugins in order to find conflicting dependencies.
 * Version: 0.0.1
 * Author: Peter Suhm
 * Author URI: http://petersuhm.com
 * License: GNU GENERAL PUBLIC LICENSE
 */

use WpComposerConflicts\Plugin;

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

require __DIR__ . '/vendor/autoload.php';

$plugin = new Plugin();
$plugin->init();
