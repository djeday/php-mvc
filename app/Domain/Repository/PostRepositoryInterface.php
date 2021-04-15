<?php

namespace App\Domain\Repository;

use App\Core\Entity\Post;

interface PostRepositoryInterface
{
    /**
     * @return Post[]
     */
    public function getAll(): array;

    public function add(Post $post);

    public function update(Post $post, int $id);

    public function delete(int $id);
}