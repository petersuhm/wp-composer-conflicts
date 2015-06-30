<?php

namespace WpComposerConflicts\Composer;

class ComposerDotJsonFile
{
    private $content;
    private $filePath;

    private function __construct()
    {
    }

    public static function fromFilePath($path)
    {
        $composerDotJsonFile = new ComposerDotJsonFile();

        $composerDotJsonFile->setContent(json_decode(file_get_contents($path), true));
        $composerDotJsonFile->setFilePath($path);

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

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getDependencies()
    {
        return isset($this->content['require']) ? $this->content['require'] : null;
    }
}
