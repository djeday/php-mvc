<?php

use Dotenv\Dotenv;
use App\Core\Routing\RouterFactory;
use App\Presentation\Controllers\PostController;

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

function exception_handler(Throwable $ex) {
    // TODO Handler exception
    $error_code = $ex->getCode() ?? 500;
    header("HTTP/2 ". $error_code);
}
set_exception_handler('exception_handler');

$router = RouterFactory::create();
$router->addRoute('/posts/all', PostController::class, 'getAllPosts');
$router->addRoute('/posts/(\d+)', PostController::class, 'getPostById');
$router->run();
