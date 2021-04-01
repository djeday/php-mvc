<?php

namespace App\Presentation\Controllers;

use App\Core\Config\ConfigurationRepositoryInterface;
use App\Core\Exceptions\ActionNotFoundException;
use App\Core\Exceptions\BaseException;
use App\Presentation\Views\AbstractView;

class BaseController
{
    protected AbstractView $view;

    protected ConfigurationRepositoryInterface $configuration;

    public function __construct(
        AbstractView $view,
        ConfigurationRepositoryInterface $configuration
    ) {
        $this->view = $view;
        $this->configuration = $configuration;
        $this->view->setTemplateDirectory($this->configuration->getConfiguration()->getTemplateDir());
    }

    /**
     * @param string $name
     * @param array $arguments
     * @throws ActionNotFoundException
     */
    public function __call(string $name, array $arguments)
    {
        throw new ActionNotFoundException("Action $name not found!", 404);
    }

    protected function callWithCatchError(Callable $function) {
        try {
            $function();
        } catch(BaseException $ex) {
            // TODO Implement catch logic
        }
    }
}