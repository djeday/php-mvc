<?php

use Dotenv\Dotenv;
use App\Core\Routing\RouterFactory;
use App\Presentation\Controllers\PostController;

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

set_error_handler('App\Utils\ErrorUtil::errorHandler', E_ALL);
set_exception_handler('App\Utils\ErrorUtil::exceptionHandler');

$router = RouterFactory::create();
$router->addRoute('/posts/all', PostController::class, 'getAllPosts');
$router->addRoute('/posts/(\d+)', PostController::class, 'getPostById');
$router->run();
