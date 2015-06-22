<?php

namespace WpComposerConflicts\Composer;

class ComposerDotJsonFile
{
    private $content;

    private function __construct()
    {
    }

    public static function fromFilePath($path)
    {
        $composerDotJsonFile = new ComposerDotJsonFile();

        $composerDotJsonFile->setContent(json_decode(file_get_contents($path), true));

        return $composerDotJsonFile;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
}
