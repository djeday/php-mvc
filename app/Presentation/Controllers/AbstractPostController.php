<?php

namespace App\Presentation\Controllers;

interface AbstractPostController extends AbstractController
{
    public function getAllPosts();

    public function getPostById(int $id);
}