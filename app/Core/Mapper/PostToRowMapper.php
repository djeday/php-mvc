<?php

namespace App\Core\Mapper;

use App\Core\Entity\Post;

class PostToRowMapper
{
    public function map(Post $post): array
    {
        $row = [];
        $row['user_id'] = $post->getUserId();
        $row['date'] = $post->getDate();
        $row['image'] = $post->getImage();
        $row['text'] = $post->getText();
        $row['title'] = $post->getTitle();

        return $row;
    }
}