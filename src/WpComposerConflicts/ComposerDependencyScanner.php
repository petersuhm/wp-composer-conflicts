<?php

namespace WpComposerConflicts;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

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

        $composerJsonFiles = array_values(
            iterator_to_array(new RegexIterator($iterator, '/composer\.json/i'))
        );

        $mapToRelativePath = function($file) use ($path) {
            return str_replace($path, '', $file->getPathName());
        };

        return array_map($mapToRelativePath, $composerJsonFiles);
    }
}
