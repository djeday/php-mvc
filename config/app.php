<?php

use App\Core\Routing\RouterFactory;
use App\Presentation\Controllers\PostController;

set_error_handler('App\Utils\ErrorUtil::errorHandler', E_ALL);
set_exception_handler('App\Utils\ErrorUtil::exceptionHandler');

$router = RouterFactory::create();
$router->addRoute('/posts/all', PostController::class, 'getAllPosts');
$router->run();
