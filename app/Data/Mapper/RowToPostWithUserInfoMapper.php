<?php

namespace App\Data\Mapper;

use App\Data\Entity\PostWithUserInfo;

class RowToPostWithUserInfoMapper
{
    public function map(array $row): PostWithUserInfo
    {
        $postWithUserInfo = new PostWithUserInfo();
        $postWithUserInfo->setDate($row['date']);
        $postWithUserInfo->setUserName($row['userName']);
        $postWithUserInfo->setImage($row['image']);
        $postWithUserInfo->setText($row['text']);
        $postWithUserInfo->setTitle($row['title']);

        return $postWithUserInfo;
    }
}