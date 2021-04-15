<?php

namespace App\Presentation\Controllers;

use App\Core\Config\ConfigurationRepositoryInterface;
use App\Domain\Repository\PostRepositoryInterface;
use App\Presentation\Views\AbstractView;

class PostController extends BaseController implements AbstractPostController
{
    private PostRepositoryInterface $postRepository;

    public function __construct(
        AbstractView $view,
        ConfigurationRepositoryInterface $configuration,
        PostRepositoryInterface $postRepository
    )
    {
        parent::__construct($view, $configuration);
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        $posts = $this->postRepository->getAll();

        $this->view->setData(
            [
                'posts' => $posts
            ]
        );
        $this->view->render('posts');
    }
}