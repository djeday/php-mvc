<?php

namespace App\Presentation\Controllers;

use App\Core\Config\ConfigurationRepositoryInterface;
use App\Presentation\Views\AbstractView;

class PostController extends BaseController implements AbstractPostController
{
    public function __construct(
        AbstractView $view,
        ConfigurationRepositoryInterface $configuration
    )
    {
        parent::__construct($view, $configuration);
    }

    public function getAllPosts()
    {
        $this->view->setData(
            [
                'title' => 'Posts list',
                'content' => 'test'
            ]
        );
        $this->view->render('posts');
    }

    public function getPostById(int $id)
    {
        print __METHOD__ . " with args id = $id";
    }
}