<?php

namespace App\Presentation\Views;

use App\Core\Config\ConfigurationFactory;

class ViewFactory
{
    public static function create(): AbstractView
    {
        $configurationRepository = ConfigurationFactory::create();

        return new View($configurationRepository->getConfiguration());
    }
}