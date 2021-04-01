<?php

namespace App\Presentation\Controllers;

use App\Core\Exceptions\ActionNotFoundException;
use App\Core\Exceptions\BaseException;
use App\Presentation\Views\AbstractView;

class BaseController
{
    protected AbstractView $view;

    public function __construct(AbstractView $view) {
        $this->view = $view;
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
//            $this->onError($ex);
        }
    }
}