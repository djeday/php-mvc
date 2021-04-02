<?php

namespace App\Core\Config;

class Configuration
{
    private string $templateDir;

    public function getTemplateDir(): string
    {
        return $this->templateDir;
    }

    public function setTemplateDir(string $templateDir): void
    {
        $this->templateDir = $templateDir;
    }
}