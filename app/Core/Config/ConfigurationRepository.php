<?php

namespace App\Core\Config;

class ConfigurationRepository implements ConfigurationRepositoryInterface
{
    public function getConfiguration(): Configuration
    {
        $configuration = new Configuration();
        $configuration->setTemplateDir(getenv('TEMPLATE_DIR'));

        return $configuration;
    }
}