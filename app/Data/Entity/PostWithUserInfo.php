<?php

namespace App\Data\Entity;

use App\Core\Entity\Post;

class PostWithUserInfo extends Post
{
    private string $userName;

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }
}