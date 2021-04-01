<?php

namespace App\Presentation\Views;

use App\Core\Config\Configuration;

class View implements AbstractView
{
    private array $data;

    private Configuration $systemConfiguration;

    public function __construct(Configuration $systemConfiguration)
    {
        $this->systemConfiguration = $systemConfiguration;
    }

    public function render(string $template = null)
    {
        $templateFile = dirname(__DIR__, 3) . $this->systemConfiguration->getTemplateDir(). $template . '.php';
        if (is_null($template)) {
            exit(implode($this->data));
        }
        extract($this->data);
        include_once $templateFile;
    }

    public function setData(array $data) {
        $this->data = $data;
    }
}