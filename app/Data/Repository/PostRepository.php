<?php

namespace App\Data\Repository;

use App\Core\Entity\Post;
use App\Core\Mapper\PostToRowMapper;
use App\Data\Mapper\RowToPostWithUserInfoMapper;
use App\Domain\Repository\PostRepositoryInterface;
use App\Domain\Storage\StorageInterface;

class PostRepository implements PostRepositoryInterface
{
    private StorageInterface $storage;

    private const ENTITY = 'posts';

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return Post[] $posts
     */
    public function getAll(): array
    {
        $postsForRender = [];
        $posts = $this->storage->findAll(self::ENTITY);

        foreach ($posts as $key => $rowPost) {
            $postView = (new RowToPostWithUserInfoMapper())->map($rowPost);
            array_push($postsForRender, $postView);
        }
        return $postsForRender;
    }

    public function add(Post $post)
    {
        $rowPost = (new PostToRowMapper)->map($post);
        $this->storage->create(self::ENTITY, $rowPost);
    }

    public function update(Post $post, int $id)
    {
        $rowPost = (new PostToRowMapper)->map($post);
        $this->storage->update(self::ENTITY, $rowPost, $id);
    }

    public function delete(int $id)
    {
        $this->storage->delete(self::ENTITY, $id);
    }
}