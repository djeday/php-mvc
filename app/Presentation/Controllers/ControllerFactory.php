<?php

namespace App\Presentation\Controllers;

use App\Core\Exceptions\ControllerNotFoundException;
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
    public static function instance(string $class): AbstractController
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

        return new $class($view);
    }
}