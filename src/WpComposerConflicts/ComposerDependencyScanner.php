<?php

namespace WpComposerConflicts;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use WpComposerConflicts\Composer\ComposerDotJsonFile;

/**
 * Class ComposerDependencyScanner
 * @package WpComposerConflicts
 */
class ComposerDependencyScanner
{
    /**
     * @param $path
     * @return array
     */
    public function composerDotJsonFiles($path)
    {
        $directory = new RecursiveDirectoryIterator($path);
        $iterator = new RecursiveIteratorIterator($directory);

        $filterOutVendorFiles = function($file) {
            return ! preg_match('/\/vendor\//', $file);
        };

        $composerJsonFiles = array_values(array_filter(array_values(
            iterator_to_array(new RegexIterator($iterator, '/composer\.json/'))
        ), $filterOutVendorFiles));

        $mapToComposerFileObjects = function($file) {
            return ComposerDotJsonFile::fromFilePath($file->getPathName());
        };

        return array_map($mapToComposerFileObjects, $composerJsonFiles);
    }
}
