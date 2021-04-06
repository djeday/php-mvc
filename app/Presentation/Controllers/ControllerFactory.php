<?php

namespace App\Presentation\Controllers;

use App\Core\Config\ConfigurationFactory;
use App\Core\Exceptions\ControllerNotFoundException;
use App\Data\Repository\PostRepository;
use App\Data\Storage\ArrayStorage;
use App\Presentation\Views\ViewFactory;
use ReflectionClass;
use ReflectionException;

class ControllerFactory
{
    /**
     * @param string $class
     * @return AbstractController
     * @throws ControllerNotFoundException
     * @throws ReflectionException
     */
    public static function create(string $class): AbstractController
    {
        if (!class_exists($class)) {
            throw new ControllerNotFoundException("Controller $class not found!", 404);
        }
        $className = (new ReflectionClass($class))->getShortName();
        return match ($className) {
            'PostController' => self::createPostController($class),
            default => null,
        };
    }

    private static function createPostController($class): AbstractPostController
    {
        $view = ViewFactory::create();
        $configurationRepository = ConfigurationFactory::create();
        $postRepository = new PostRepository(new ArrayStorage());

        return new $class($view, $configurationRepository, $postRepository);
    }
}